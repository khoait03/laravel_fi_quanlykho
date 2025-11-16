<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    public function mount(): void
    {
        parent::mount();
        
        // Auto-fill customer từ URL parameter
        $customerId = request()->query('customer_id');
        
        if ($customerId && \App\Models\Customer::find($customerId)) {
            $this->data['customer_id'] = (int) $customerId;
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->record]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        
        return $data;
    }

    protected function afterCreate(): void
    {
        // Tính toán lại tổng tiền sau khi tạo
        $this->record->calculateTotals();
    }
}