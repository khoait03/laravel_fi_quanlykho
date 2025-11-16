<?php

namespace App\Filament\Resources\PurchaseOrderResource\Pages;

use App\Filament\Resources\PurchaseOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePurchaseOrder extends CreateRecord
{
    protected static string $resource = PurchaseOrderResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }
    
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Tạo phiếu nhập thành công';
    }
    
    protected function afterCreate(): void
    {
        // Tự động cập nhật tồn kho nếu cần
        // $this->record->updateProductStock();
    }
}