<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class TopCustomersWidget extends BaseWidget
{
    use HasWidgetShield;
    
    protected static ?string $heading = 'Top khách hàng';
    
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Top 10 Khách Hàng Mua Nhiều Nhất')
            ->query(
                Customer::query()
                    ->where('is_active', true)
                    ->where('total_purchased', '>', 0)
                    ->orderBy('total_purchased', 'desc')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã KH')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên khách hàng')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('phone')
                    ->label('SĐT')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('customerType.name')
                    ->label('Loại KH')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'VIP' => 'danger',
                        'Thân thiết' => 'success',
                        'Thường xuyên' => 'info',
                        default => 'gray',
                    }),
                    
                Tables\Columns\TextColumn::make('total_purchased')
                    ->label('Tổng mua')
                    ->money('VND')
                    ->sortable()
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('VND')
                            ->label('Tổng cộng'),
                    ]),
                    
                Tables\Columns\TextColumn::make('total_debt')
                    ->label('Công nợ')
                    ->money('VND')
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'success')
                    ->sortable(),
            ])
            ->paginated(false);
    }
}