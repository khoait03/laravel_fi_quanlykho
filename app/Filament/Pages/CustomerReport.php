<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use App\Models\Customer;
use App\Models\CustomerType;
use App\Models\Order;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class CustomerReport extends Page implements HasForms
{
    use InteractsWithForms;
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Báo cáo khách hàng';
    protected static ?string $title = 'Báo cáo khách hàng';
    protected static ?string $navigationGroup = 'Báo cáo & Thống kê';
    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.customer-report';

    public ?array $data = [];
    public $customer_type_id = null;
    public $debt_status = 'all';
    public $statistics = [];

    public function mount(): void
    {
        $this->form->fill([
            'customer_type_id' => null,
            'debt_status' => 'all',
        ]);
        $this->loadStatistics();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Lọc khách hàng')
                    ->schema([
                        Select::make('customer_type_id')
                            ->label('Loại khách hàng')
                            ->options(CustomerType::pluck('name', 'id'))
                            ->searchable()
                            ->placeholder('Tất cả loại'),
                        Select::make('debt_status')
                            ->label('Trạng thái công nợ')
                            ->options([
                                'all' => 'Tất cả',
                                'has_debt' => 'Có công nợ',
                                'no_debt' => 'Không có nợ',
                            ])
                            ->default('all')
                            ->required(),
                    ])
                    ->columns(2)
            ])
            ->statePath('data');
    }

    public function applyFilter(): void
    {
        $data = $this->form->getState();
        $this->customer_type_id = $data['customer_type_id'];
        $this->debt_status = $data['debt_status'];
        $this->loadStatistics();
    }

    public function loadStatistics(): void
    {
        $query = Customer::with('customerType')->where('is_active', true);

        // Lọc theo loại khách hàng
        if ($this->customer_type_id) {
            $query->where('customer_type_id', $this->customer_type_id);
        }

        // Lọc theo công nợ
        switch ($this->debt_status) {
            case 'has_debt':
                $query->where('total_debt', '>', 0);
                break;
            case 'no_debt':
                $query->where('total_debt', 0);
                break;
        }

        $customers = $query->get();

        $this->statistics = [
            // Tổng quan khách hàng
            'total_customers' => Customer::where('is_active', true)->where('is_walk_in', false)->count(),
            'vip_customers' => Customer::where('is_active', true)
                ->whereHas('customerType', function($q) {
                    $q->where('name', 'LIKE', '%VIP%');
                })
                ->count(),
            'customers_with_debt' => Customer::where('is_active', true)
                ->where('total_debt', '>', 0)
                ->count(),
            'total_debt' => Customer::where('is_active', true)->sum('total_debt'),
            
            // Khách hàng theo loại
            'by_type' => $this->getCustomersByType(),
            
            // Top khách hàng
            'top_customers' => $this->getTopCustomers(),
            
            // Khách hàng có nợ
            'debt_customers' => $this->getDebtCustomers(),
            
            // Chi tiết khách hàng
            'customers' => $customers->map(function ($customer) {
                return [
                    'code' => $customer->code,
                    'name' => $customer->name,
                    'phone' => $customer->phone,
                    'type' => $customer->customerType->name ?? 'N/A',
                    'total_purchased' => $customer->total_purchased,
                    'total_debt' => $customer->total_debt,
                    'order_count' => $customer->orders()->count(),
                ];
            }),
        ];
    }

    protected function getCustomersByType()
    {
        return CustomerType::withCount(['customers' => function ($query) {
                $query->where('is_active', true);
            }])
            ->get()
            ->map(function ($type) {
                $totalPurchased = Customer::where('customer_type_id', $type->id)
                    ->where('is_active', true)
                    ->sum('total_purchased');
                $totalDebt = Customer::where('customer_type_id', $type->id)
                    ->where('is_active', true)
                    ->sum('total_debt');
                
                return [
                    'type_name' => $type->name,
                    'customer_count' => $type->customers_count,
                    'total_purchased' => $totalPurchased,
                    'total_debt' => $totalDebt,
                ];
            });
    }

    protected function getTopCustomers()
    {
        return Customer::where('is_active', true)
            ->where('is_walk_in', false)
            ->orderByDesc('total_purchased')
            ->limit(10)
            ->get()
            ->map(function ($customer) {
                return [
                    'code' => $customer->code,
                    'name' => $customer->name,
                    'phone' => $customer->phone,
                    'type' => $customer->customerType->name ?? 'N/A',
                    'total_purchased' => $customer->total_purchased,
                    'order_count' => $customer->orders()->count(),
                ];
            });
    }

    protected function getDebtCustomers()
    {
        return Customer::where('is_active', true)
            ->where('total_debt', '>', 0)
            ->orderByDesc('total_debt')
            ->limit(20)
            ->get()
            ->map(function ($customer) {
                return [
                    'code' => $customer->code,
                    'name' => $customer->name,
                    'phone' => $customer->phone,
                    'total_debt' => $customer->total_debt,
                    'total_purchased' => $customer->total_purchased,
                ];
            });
    }
}