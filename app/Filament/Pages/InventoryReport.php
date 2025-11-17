<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use App\Models\Product;
use App\Models\Category;

class InventoryReport extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Báo cáo tồn kho';
    protected static ?string $title = 'Báo cáo tồn kho';
    protected static ?string $navigationGroup = 'Báo cáo & Thống kê';
    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.inventory-report';

    public ?array $data = [];
    public $category_id = null;
    public $stock_status = 'all';
    public $statistics = [];

    public function mount(): void
    {
        $this->form->fill([
            'category_id' => null,
            'stock_status' => 'all',
        ]);
        $this->loadStatistics();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Lọc sản phẩm')
                    ->schema([
                        Select::make('category_id')
                            ->label('Danh mục')
                            ->options(Category::where('is_active', true)->pluck('name', 'id'))
                            ->searchable()
                            ->placeholder('Tất cả danh mục'),
                        Select::make('stock_status')
                            ->label('Trạng thái tồn kho')
                            ->options([
                                'all' => 'Tất cả',
                                'in_stock' => 'Còn hàng',
                                'low_stock' => 'Sắp hết',
                                'out_of_stock' => 'Hết hàng',
                            ])
                            ->default('all')
                            ->required(),
                    ])
                    ->columns(2)
            ])
            ->statePath('data');
    }

    public function applyFilter(): void
    {
        $data = $this->form->getState();
        $this->category_id = $data['category_id'];
        $this->stock_status = $data['stock_status'];
        $this->loadStatistics();
    }

    public function loadStatistics(): void
    {
        $query = Product::with(['category', 'variant']);

        // Lọc theo danh mục
        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        // Lọc theo trạng thái tồn kho
        switch ($this->stock_status) {
            case 'out_of_stock':
                $query->where('stock_quantity', 0);
                break;
            case 'low_stock':
                $query->whereColumn('stock_quantity', '<=', 'min_stock_alert')
                      ->where('stock_quantity', '>', 0);
                break;
            case 'in_stock':
                $query->whereColumn('stock_quantity', '>', 'min_stock_alert');
                break;
        }

        $products = $query->where('is_active', true)->get();

        // Tính toán thống kê
        $this->statistics = [
            'total_products' => Product::where('is_active', true)->count(),
            'in_stock' => Product::where('is_active', true)
                ->whereColumn('stock_quantity', '>', 'min_stock_alert')
                ->count(),
            'low_stock' => Product::where('is_active', true)
                ->whereColumn('stock_quantity', '<=', 'min_stock_alert')
                ->where('stock_quantity', '>', 0)
                ->count(),
            'out_of_stock' => Product::where('is_active', true)
                ->where('stock_quantity', 0)
                ->count(),
            
            'total_stock_value' => $products->sum(function ($product) {
                return $product->stock_quantity * $product->purchase_price;
            }),
            
            'products' => $products->map(function ($product) {
                return [
                    'code' => $product->code,
                    'name' => $product->name,
                    'category' => $product->category->name ?? 'N/A',
                    'variant' => $product->variant->name ?? 'N/A',
                    'stock_quantity' => $product->stock_quantity,
                    'min_stock_alert' => $product->min_stock_alert,
                    'purchase_price' => $product->purchase_price,
                    'retail_price' => $product->retail_price,
                    'stock_value' => $product->stock_quantity * $product->purchase_price,
                    'status' => $this->getStockStatus($product),
                ];
            }),
            
            // Giá trị tồn kho theo danh mục
            'value_by_category' => $this->getValueByCategory(),
        ];
    }

    protected function getStockStatus($product): string
    {
        if ($product->stock_quantity == 0) {
            return 'out_of_stock';
        } elseif ($product->stock_quantity <= $product->min_stock_alert) {
            return 'low_stock';
        }
        return 'in_stock';
    }

    protected function getValueByCategory()
    {
        return Product::where('is_active', true)
            ->with('category')
            ->get()
            ->groupBy('category_id')
            ->map(function ($products, $categoryId) {
                $category = Category::find($categoryId);
                $totalValue = $products->sum(function ($product) {
                    return $product->stock_quantity * $product->purchase_price;
                });
                
                return [
                    'category_name' => $category->name ?? 'Chưa phân loại',
                    'product_count' => $products->count(),
                    'total_quantity' => $products->sum('stock_quantity'),
                    'total_value' => $totalValue,
                ];
            })
            ->sortByDesc('total_value')
            ->values();
    }
}