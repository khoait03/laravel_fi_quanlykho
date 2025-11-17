<?php


namespace App\Filament\Resources\PurchaseOrderResource\Pages;

use App\Filament\Resources\PurchaseOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPurchaseOrders extends ListRecords
{
    protected static string $resource = PurchaseOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tạo phiếu nhập')
                ->icon('heroicon-o-plus'),
        ];
    }
    
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Tất cả'),
            'unpaid' => Tab::make('Chưa thanh toán')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'unpaid'))
                ->badge(fn () => static::getResource()::getModel()::where('payment_status', 'unpaid')->count())
                ->badgeColor('danger'),
            'partial' => Tab::make('Thanh toán 1 phần')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'partial'))
                ->badge(fn () => static::getResource()::getModel()::where('payment_status', 'partial')->count())
                ->badgeColor('warning'),
            'paid' => Tab::make('Đã thanh toán')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'paid'))
                ->badgeColor('success'),
        ];
    }
}