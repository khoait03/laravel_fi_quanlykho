<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\RepeatableEntry;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Thông tin đơn hàng')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('code')
                                    ->label('Mã đơn hàng')
                                    ->copyable()
                                    ->weight('bold')
                                    ->size(TextEntry\TextEntrySize::Large),

                                TextEntry::make('order_date')
                                    ->label('Ngày bán')
                                    ->date('d/m/Y'),

                                TextEntry::make('customer.name')
                                    ->label('Khách hàng')
                                    ->default('Khách vãng lai')
                                    ->icon('heroicon-m-user'),

                                TextEntry::make('order_status')
                                    ->label('Trạng thái đơn hàng')
                                    ->badge()
                                    ->formatStateUsing(fn (string $state): string => match ($state) {
                                        'pending' => 'Chờ xử lý',
                                        'processing' => 'Đang xử lý',
                                        'completed' => 'Hoàn thành',
                                        'cancelled' => 'Đã hủy',
                                        default => $state,
                                    })
                                    ->colors([
                                        'warning' => 'pending',
                                        'primary' => 'processing',
                                        'success' => 'completed',
                                        'danger' => 'cancelled',
                                    ]),

                                TextEntry::make('payment_status')
                                    ->label('Trạng thái thanh toán')
                                    ->badge()
                                    ->formatStateUsing(fn (string $state): string => match ($state) {
                                        'unpaid' => 'Chưa thanh toán',
                                        'deposit' => 'Đã đặt cọc',
                                        'partial' => 'Thanh toán một phần',
                                        'paid' => 'Đã thanh toán',
                                        default => $state,
                                    })
                                    ->colors([
                                        'danger' => 'unpaid',
                                        'warning' => ['deposit', 'partial'],
                                        'success' => 'paid',
                                    ]),

                                TextEntry::make('creator.name')
                                    ->label('Người tạo')
                                    ->icon('heroicon-m-user-circle'),
                            ]),
                    ])
                    ->columns(3),

                Section::make('Sản phẩm')
                    ->schema([
                        RepeatableEntry::make('items')
                            ->label('')
                            ->schema([
                                TextEntry::make('product.name')
                                    ->label('Sản phẩm')
                                    ->weight('bold'),

                                TextEntry::make('quantity')
                                    ->label('Số lượng'),

                                TextEntry::make('unit_price')
                                    ->label('Đơn giá')
                                    ->money('VND', locale: 'vi'),

                                TextEntry::make('total_price')
                                    ->label('Thành tiền')
                                    ->money('VND', locale: 'vi')
                                    ->weight('bold'),
                            ])
                            ->columns(4),
                    ]),

                Section::make('Thanh toán')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('total_amount')
                                    ->label('Tổng tiền')
                                    ->money('VND', locale: 'vi')
                                    ->size(TextEntry\TextEntrySize::Large),

                                TextEntry::make('discount_amount')
                                    ->label('Giảm giá')
                                    ->money('VND', locale: 'vi')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->color('danger'),

                                TextEntry::make('grand_total')
                                    ->label('Tổng thanh toán')
                                    ->money('VND', locale: 'vi')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->weight('bold')
                                    ->color('success'),

                                TextEntry::make('deposit_amount')
                                    ->label('Tiền đặt cọc')
                                    ->money('VND', locale: 'vi'),

                                TextEntry::make('paid_amount')
                                    ->label('Đã thanh toán')
                                    ->money('VND', locale: 'vi')
                                    ->color('success'),

                                TextEntry::make('debt_amount')
                                    ->label('Còn nợ')
                                    ->money('VND', locale: 'vi')
                                    ->color(fn ($state) => $state > 0 ? 'danger' : 'success')
                                    ->weight(fn ($state) => $state > 0 ? 'bold' : 'normal'),
                            ]),

                        TextEntry::make('notes')
                            ->label('Ghi chú')
                            ->default('Không có ghi chú')
                            ->columnSpanFull(),
                    ]),

                Section::make('Thông tin bổ sung')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('created_at')
                                    ->label('Ngày tạo')
                                    ->dateTime('d/m/Y H:i'),

                                TextEntry::make('updated_at')
                                    ->label('Cập nhật lần cuối')
                                    ->dateTime('d/m/Y H:i'),
                            ]),
                    ])
                    ->collapsed(),
            ]);
    }
}