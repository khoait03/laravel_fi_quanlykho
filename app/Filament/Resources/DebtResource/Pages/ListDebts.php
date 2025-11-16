<?php

namespace App\Filament\Resources\DebtResource\Pages;

use App\Filament\Resources\DebtResource;
use App\Models\Order;
use App\Models\Customer;
use App\Models\PurchaseOrder;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListDebts extends ListRecords
{
    protected static string $resource = DebtResource::class;

    protected function getHeaderActions(): array
    {
        return [
           
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Tất cả công nợ')
                ->badge(Order::where('debt_amount', '>', 0)->count())
                ->badgeColor('danger'),

            'unpaid' => Tab::make('Chưa thanh toán')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'unpaid'))
                ->badge(Order::where('payment_status', 'unpaid')->count())
                ->badgeColor('danger'),

            'partial' => Tab::make('Thanh toán 1 phần')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'partial'))
                ->badge(Order::where('payment_status', 'partial')->count())
                ->badgeColor('warning'),

            'overdue' => Tab::make('Quá hạn (>30 ngày)')
                ->modifyQueryUsing(fn (Builder $query) => 
                    $query->whereRaw('DATEDIFF(NOW(), order_date) > 30')
                )
                ->badge(Order::where('debt_amount', '>', 0)
                    ->whereRaw('DATEDIFF(NOW(), order_date) > 30')
                    ->count())
                ->badgeColor('danger'),

            'high_debt' => Tab::make('Nợ cao (>5 triệu)')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('debt_amount', '>', 5000000))
                ->badge(Order::where('debt_amount', '>', 5000000)->count())
                ->badgeColor('danger'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            DebtResource\Widgets\DebtStatsWidget::class,
        ];
    }
}