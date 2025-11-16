<?php

namespace App\Filament\Imports;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Str;

class ProductImport extends Importer
{
    protected static ?string $model = Product::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('code')
                ->label('Mã sản phẩm')
                ->requiredMapping()
                ->rules(['required', 'max:100'])
                ->example('SP001'),
            
            ImportColumn::make('name')
                ->label('Tên sản phẩm')
                ->requiredMapping()
                ->rules(['required', 'max:255'])
                ->example('Sản phẩm mẫu'),
            
            ImportColumn::make('slug')
                ->label('Slug')
                ->rules(['max:255'])
                ->example('san-pham-mau'),
            
            ImportColumn::make('category')
                ->label('Danh mục')
                ->relationship(resolveUsing: 'name')
                ->example('Điện tử'),
            
            ImportColumn::make('variant')
                ->label('Đơn vị tính')
                ->relationship(resolveUsing: 'name')
                ->example('Cái'),
            
            ImportColumn::make('purchase_price')
                ->label('Giá nhập')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'numeric', 'min:0'])
                ->example('100000'),
            
            ImportColumn::make('retail_price')
                ->label('Giá bán lẻ')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'numeric', 'min:0'])
                ->example('150000'),
            
            ImportColumn::make('collaborator_price')
                ->label('Giá cộng tác viên')
                ->numeric()
                ->rules(['nullable', 'numeric', 'min:0'])
                ->example('130000'),
            
            ImportColumn::make('stock_quantity')
                ->label('Số lượng tồn kho')
                ->numeric()
                ->rules(['nullable', 'numeric', 'min:0'])
                ->example('100'),
            
            ImportColumn::make('min_stock_alert')
                ->label('Cảnh báo tồn tối thiểu')
                ->numeric()
                ->rules(['nullable', 'numeric', 'min:0'])
                ->example('10'),
            
            ImportColumn::make('is_active')
                ->label('Đang bán')
                ->boolean()
                ->rules(['nullable', 'boolean'])
                ->example('Có'),
            
            ImportColumn::make('description')
                ->label('Mô tả')
                ->rules(['nullable'])
                ->example('Mô tả sản phẩm'),
        ];
    }

    public function resolveRecord(): ?Product
    {
        // Tìm hoặc tạo Category
        $categoryName = $this->data['category'] ?? null;
        $categoryId = null;
        if ($categoryName) {
            $category = Category::firstOrCreate(
                ['name' => $categoryName],
                ['description' => null]
            );
            $categoryId = $category->id;
        }

        // Tìm hoặc tạo ProductVariant
        $variantName = $this->data['variant'] ?? null;
        $variantId = null;
        if ($variantName) {
            $variant = ProductVariant::firstOrCreate(
                ['name' => $variantName],
                [
                    'code' => strtolower(substr($variantName, 0, 3)),
                    'is_active' => true
                ]
            );
            $variantId = $variant->id;
        }

        // Tạo slug nếu không có
        $slug = $this->data['slug'] ?? Str::slug($this->data['name']);

        // Chuyển đổi is_active
        $isActive = true;
        if (isset($this->data['is_active'])) {
            if (is_bool($this->data['is_active'])) {
                $isActive = $this->data['is_active'];
            } else {
                $isActive = in_array(strtolower($this->data['is_active']), ['có', 'yes', 'true', '1']);
            }
        }

        // Tìm hoặc tạo Product
        return Product::updateOrCreate(
            ['code' => $this->data['code']],
            [
                'name' => $this->data['name'],
                'slug' => $slug,
                'category_id' => $categoryId,
                'variant_id' => $variantId,
                'purchase_price' => $this->data['purchase_price'] ?? 0,
                'retail_price' => $this->data['retail_price'] ?? 0,
                'collaborator_price' => $this->data['collaborator_price'] ?? 0,
                'stock_quantity' => $this->data['stock_quantity'] ?? 0,
                'min_stock_alert' => $this->data['min_stock_alert'] ?? 0,
                'is_active' => $isActive,
                'description' => $this->data['description'] ?? null,
            ]
        );
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Nhập ' . number_format($import->successful_rows) . ' sản phẩm thành công.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' sản phẩm thất bại.';
        }

        return $body;
    }
}