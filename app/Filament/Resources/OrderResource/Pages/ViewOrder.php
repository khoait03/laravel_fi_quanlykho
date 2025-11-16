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
            
            // Action hoàn thành đơn hàng
            Actions\Action::make('complete')
                ->label('Hoàn thành đơn')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Xác nhận hoàn thành đơn hàng')
                ->modalDescription('Hành động này sẽ trừ số lượng hàng tồn kho theo số lượng sản phẩm đơn hàng. Bạn có chắc chắn?')
                ->visible(fn () => $this->record->order_status !== 'completed' && $this->record->order_status !== 'cancelled')
                ->action(function () {
                    // Kiểm tra tồn kho
                    if (!$this->record->hasEnoughStock()) {
                        $insufficient = $this->record->getInsufficientStockProducts();
                        $message = "Không đủ tồn kho:\n";
                        foreach ($insufficient as $item) {
                            $message .= "- {$item['product']}: Cần {$item['required']}, còn {$item['available']}\n";
                        }
                        
                        \Filament\Notifications\Notification::make()
                            ->danger()
                            ->title('Không đủ tồn kho')
                            ->body($message)
                            ->persistent()
                            ->send();
                        
                        return;
                    }
                    
                    // Trừ tồn kho
                    $this->record->reduceStock();
                    
                    // Cập nhật trạng thái
                    $this->record->order_status = 'completed';
                    $this->record->save();
                    
                    \Filament\Notifications\Notification::make()
                        ->success()
                        ->title('Đơn hàng đã hoàn thành')
                        ->body('Tồn kho đã được cập nhật.')
                        ->send();
                        
                    $this->redirect($this->getResource()::getUrl('view', ['record' => $this->record]));
                }),
            
            // Action hủy đơn hàng
            // Actions\Action::make('cancel')
            //     ->label('Hủy đơn')
            //     ->icon('heroicon-o-x-circle')
            //     ->color('danger')
            //     ->requiresConfirmation()
            //     ->modalHeading('Xác nhận hủy đơn hàng')
            //     ->modalDescription('Nếu đơn đã hoàn thành, tồn kho sẽ được hoàn trả.')
            //     ->visible(fn () => $this->record->order_status !== 'cancelled')
            //     ->action(function () {
            //         // Nếu đơn đã hoàn thành, hoàn trả tồn kho
            //         if ($this->record->order_status === 'completed') {
            //             $this->record->restoreStock();
            //         }
                    
            //         // Cập nhật trạng thái
            //         $this->record->order_status = 'cancelled';
            //         $this->record->save();
                    
            //         \Filament\Notifications\Notification::make()
            //             ->success()
            //             ->title('Đơn hàng đã hủy')
            //             ->body($this->record->order_status === 'completed' ? 'Tồn kho đã được hoàn trả.' : '')
            //             ->send();
                        
            //         $this->redirect($this->getResource()::getUrl('view', ['record' => $this->record]));
            //     }),
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