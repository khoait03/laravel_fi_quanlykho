<?php

namespace App\Filament\Exports;

use App\Models\Product;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ProductExport extends Exporter
{
    protected static ?string $model = Product::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('code')
                ->label('Mã sản phẩm'),
            
            ExportColumn::make('name')
                ->label('Tên sản phẩm'),
            
            ExportColumn::make('slug')
                ->label('Slug'),
            
            ExportColumn::make('category.name')
                ->label('Danh mục'),
            
            ExportColumn::make('variant.name')
                ->label('Đơn vị tính'),
            
            ExportColumn::make('variant.code')
                ->label('Mã đơn vị tính'),
            
            ExportColumn::make('purchase_price')
                ->label('Giá nhập'),
            
            ExportColumn::make('retail_price')
                ->label('Giá bán lẻ'),
            
            ExportColumn::make('collaborator_price')
                ->label('Giá cộng tác viên'),
            
            ExportColumn::make('stock_quantity')
                ->label('Số lượng tồn kho'),
            
            ExportColumn::make('min_stock_alert')
                ->label('Cảnh báo tồn tối thiểu'),
            
            ExportColumn::make('is_active')
                ->label('Đang bán')
                ->formatStateUsing(fn ($state) => $state ? 'Có' : 'Không'),
            
            ExportColumn::make('description')
                ->label('Mô tả'),
            
            ExportColumn::make('created_at')
                ->label('Ngày tạo'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Xuất ' . number_format($export->successful_rows) . ' sản phẩm thành công.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' sản phẩm thất bại.';
        }

        return $body;
    }
}