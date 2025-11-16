<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            
            
            // Action hoàn thành đơn hàng
            Actions\Action::make('complete')
                ->label('Hoàn thành đơn')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Xác nhận hoàn thành đơn hàng')
                ->modalDescription('Hành động này sẽ trừ tồn kho. Bạn có chắc chắn?')
                ->visible(fn () => $this->record->order_status !== 'completed' && $this->record->order_status !== 'cancelled')
                ->action(function () {
                    // Kiểm tra tồn kho
                    if (!$this->record->hasEnoughStock()) {
                        $insufficient = $this->record->getInsufficientStockProducts();
                        $message = "Không đủ tồn kho:\n";
                        foreach ($insufficient as $item) {
                            $message .= "- {$item['product']}: Cần {$item['required']}, còn {$item['available']}\n";
                        }
                        
                        Notification::make()
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
                    
                    Notification::make()
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
                    
            //         Notification::make()
            //             ->success()
            //             ->title('Đơn hàng đã hủy')
            //             ->body($this->record->order_status === 'completed' ? 'Tồn kho đã được hoàn trả.' : '')
            //             ->send();
                        
            //         $this->redirect($this->getResource()::getUrl('view', ['record' => $this->record]));
            //     }),


            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->record]);
    }

    protected function afterSave(): void
    {
        // Tính toán lại tổng tiền sau khi cập nhật
        $this->record->calculateTotals();
    }
}