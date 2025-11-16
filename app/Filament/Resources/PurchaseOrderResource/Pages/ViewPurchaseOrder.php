<?php 
namespace App\Filament\Resources\PurchaseOrderResource\Pages;

use App\Filament\Resources\PurchaseOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Grid;

class ViewPurchaseOrder extends ViewRecord
{
    protected static string $resource = PurchaseOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('updateStock')
                ->label('Cập nhật kho')
                ->icon('heroicon-o-arrow-path')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Cập nhật tồn kho')
                ->modalDescription('Bạn có chắc muốn cập nhật tồn kho từ phiếu nhập này? Sau khi xác nhận số lượng sẽ được cộng trực tiếp vào số lượng tồn kho của sản phẩm')
                ->action(function () {
                    $this->record->updateProductStock();
                    
                    \Filament\Notifications\Notification::make()
                        ->success()
                        ->title('Cập nhật thành công')
                        ->body('Tồn kho đã được cập nhật từ phiếu nhập.')
                        ->send();
                }),
        ];
    }
    
    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Thông tin phiếu nhập')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('code')
                                    ->label('Mã phiếu nhập')
                                    ->copyable()
                                    ->weight('bold'),
                                TextEntry::make('supplier.name')
                                    ->label('Nhà cung cấp')
                                    ->badge()
                                    ->color('info'),
                                TextEntry::make('purchase_date')
                                    ->label('Ngày nhập')
                                    ->date('d/m/Y'),
                            ]),
                    ]),
                    
                Section::make('Chi tiết sản phẩm')
                    ->schema([
                        RepeatableEntry::make('items')
                            ->schema([
                                TextEntry::make('product.name')
                                    ->label('Sản phẩm'),
                                TextEntry::make('quantity')
                                    ->label('Số lượng')
                                    ->badge()
                                    ->color('info'),
                                TextEntry::make('unit_price')
                                    ->label('Đơn giá')
                                    ->money('VND'),
                                TextEntry::make('total_price')
                                    ->label('Thành tiền')
                                    ->money('VND')
                                    ->weight('bold'),
                            ])
                            ->columns(4),
                    ]),
                    
                Section::make('Chi phí và thanh toán')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('total_amount')
                                    ->label('Tổng tiền hàng')
                                    ->money('VND'),
                                TextEntry::make('shipping_fee')
                                    ->label('Phí vận chuyển')
                                    ->money('VND'),
                                TextEntry::make('other_fees')
                                    ->label('Chi phí khác')
                                    ->money('VND'),
                            ]),
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('grand_total')
                                    ->label('Tổng cộng')
                                    ->money('VND')
                                    ->weight('bold')
                                    ->size('lg')
                                    ->color('success'),
                                TextEntry::make('paid_amount')
                                    ->label('Đã thanh toán')
                                    ->money('VND')
                                    ->color('info'),
                                TextEntry::make('debt_amount')
                                    ->label('Còn nợ')
                                    ->money('VND')
                                    ->color(fn ($state) => $state > 0 ? 'danger' : 'success')
                                    ->weight('bold'),
                            ]),
                        TextEntry::make('payment_status')
                            ->label('Trạng thái thanh toán')
                            ->badge()
                            ->formatStateUsing(fn ($state) => match($state) {
                                'paid' => 'Đã thanh toán',
                                'partial' => 'Thanh toán 1 phần',
                                'unpaid' => 'Chưa thanh toán',
                                default => 'Không xác định',
                            })
                            ->colors([
                                'success' => 'paid',
                                'warning' => 'partial',
                                'danger' => 'unpaid',
                            ]),
                        TextEntry::make('notes')
                            ->label('Ghi chú')
                            ->columnSpanFull()
                            ->placeholder('Không có ghi chú'),
                    ]),
                    
                Section::make('Thông tin khác')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('creator.name')
                                    ->label('Người tạo'),
                                TextEntry::make('created_at')
                                    ->label('Ngày tạo')
                                    ->dateTime('d/m/Y H:i'),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }
}