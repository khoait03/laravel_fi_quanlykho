<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tạo đơn hàng'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Tất cả'),
            
            'pending' => Tab::make('Chờ xử lý')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('order_status', 'pending'))
                ->badge(fn () => \App\Models\Order::where('order_status', 'pending')->count()),
            
            'processing' => Tab::make('Đang xử lý')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('order_status', 'processing'))
                ->badge(fn () => \App\Models\Order::where('order_status', 'processing')->count()),
            
            'completed' => Tab::make('Hoàn thành')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('order_status', 'completed'))
                ->badge(fn () => \App\Models\Order::where('order_status', 'completed')->count()),
            
            'unpaid' => Tab::make('Chưa thanh toán')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'unpaid'))
                ->badge(fn () => \App\Models\Order::where('payment_status', 'unpaid')->count())
                ->badgeColor('danger'),
            
            'with_debt' => Tab::make('Còn nợ')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('debt_amount', '>', 0))
                ->badge(fn () => \App\Models\Order::where('debt_amount', '>', 0)->count())
                ->badgeColor('warning'),
        ];
    }
}