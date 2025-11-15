<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Auto-generate customer code if empty
        if (empty($data['code'])) {
            $lastCustomer = \App\Models\Customer::latest('id')->first();
            $nextNumber = $lastCustomer ? ((int) substr($lastCustomer->code, 2)) + 1 : 1;
            $data['code'] = 'KH' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        }

        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Khách hàng đã được tạo')
            ->body('Khách hàng đã được thêm vào hệ thống thành công.');
    }
}