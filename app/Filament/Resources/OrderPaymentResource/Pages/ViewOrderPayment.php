<?php 

namespace App\Filament\Resources\OrderPaymentResource\Pages;

use App\Filament\Resources\OrderPaymentResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class ViewOrderPayment extends ViewRecord
{
    protected static string $resource = OrderPaymentResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Components\Section::make('Thông tin thanh toán')
                    ->schema([
                        Components\Grid::make(2)
                            ->schema([
                                Components\TextEntry::make('order.code')
                                    ->label('Mã đơn hàng')
                                    ->weight('bold')
                                    ->color('primary')
                                    ->url(fn ($record) => route('filament.admin.resources.orders.view', $record->order_id)),
                                    
                                Components\TextEntry::make('order.customer.name')
                                    ->label('Khách hàng'),
                                    
                                Components\TextEntry::make('payment_date')
                                    ->label('Ngày thanh toán')
                                    ->dateTime('d/m/Y H:i'),
                                    
                                Components\TextEntry::make('amount')
                                    ->label('Số tiền')
                                    ->money('VND')
                                    ->weight('bold')
                                    ->size('lg'),
                                    
                                Components\TextEntry::make('payment_method')
                                    ->label('Phương thức thanh toán')
                                    ->formatStateUsing(fn ($state) => match($state) {
                                        'cash' => 'Tiền mặt',
                                        'bank_transfer' => 'Chuyển khoản',
                                        'card' => 'Thẻ',
                                        'e_wallet' => 'Ví điện tử',
                                        'other' => 'Khác',
                                        default => 'Không xác định',
                                    })
                                    ->badge()
                                    ->color(fn ($state) => match($state) {
                                        'cash' => 'success',
                                        'bank_transfer' => 'info',
                                        'card' => 'warning',
                                        'e_wallet' => 'primary',
                                        'other' => 'gray',
                                        default => 'gray',
                                    }),
                                    
                                Components\TextEntry::make('creator.name')
                                    ->label('Người tạo'),
                            ]),
                            
                        Components\TextEntry::make('notes')
                            ->label('Ghi chú')
                            ->columnSpanFull()
                            ->default('Không có ghi chú'),
                    ]),
                    
                Components\Section::make('Thông tin đơn hàng')
                    ->schema([
                        Components\Grid::make(3)
                            ->schema([
                                Components\TextEntry::make('order.grand_total')
                                    ->label('Tổng đơn hàng')
                                    ->money('VND'),
                                    
                                Components\TextEntry::make('order.paid_amount')
                                    ->label('Đã thanh toán')
                                    ->money('VND')
                                    ->color('success'),
                                    
                                Components\TextEntry::make('order.debt_amount')
                                    ->label('Còn nợ')
                                    ->money('VND')
                                    ->color(fn ($state) => $state > 0 ? 'danger' : 'success'),
                            ]),
                    ]),
                    
                Components\Section::make('Thời gian')
                    ->schema([
                        Components\Grid::make(2)
                            ->schema([
                                Components\TextEntry::make('created_at')
                                    ->label('Ngày tạo')
                                    ->dateTime('d/m/Y H:i:s'),
                                    
                                Components\TextEntry::make('updated_at')
                                    ->label('Ngày cập nhật')
                                    ->dateTime('d/m/Y H:i:s'),
                            ]),
                    ])
                    ->collapsed(),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            // Không có actions
        ];
    }
}