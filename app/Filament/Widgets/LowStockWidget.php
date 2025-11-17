<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LowStockWidget extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Sản Phẩm Sắp Hết Hàng / Hết Hàng')
            ->query(
                Product::query()
                    ->where('is_active', true)
                    ->where(function($query) {
                        $query->whereColumn('stock_quantity', '<=', 'min_stock_alert')
                              ->orWhere('stock_quantity', 0);
                    })
                    ->orderBy('stock_quantity', 'asc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã SP')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                    
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Danh mục')
                    ->badge()
                    ->color('info'),
                    
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label('Tồn kho')
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state == 0 => 'danger',
                        $state <= 5 => 'warning',
                        default => 'success',
                    }),
                    
                Tables\Columns\TextColumn::make('min_stock_alert')
                    ->label('Tồn tối thiểu')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('retail_price')
                    ->label('Giá bán')
                    ->money('VND'),
                    
                Tables\Columns\IconColumn::make('is_low_stock')
                    ->label('Trạng thái')
                    ->boolean()
                    ->trueIcon('heroicon-o-exclamation-triangle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('warning')
                    ->falseColor('danger')
                    ->getStateUsing(fn ($record) => $record->stock_quantity > 0),
            ])
            ->paginated([10, 25, 50]);
    }
}