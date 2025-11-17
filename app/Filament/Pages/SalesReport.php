<?php

namespace App\Filament\Pages;

use App\Models\Order;
use App\Models\OrderItem;
use Filament\Pages\Page;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\DB;

class SalesReport extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    
    protected static ?string $navigationLabel = 'Báo Cáo Bán Hàng';
    
    protected static ?string $title = 'Báo Cáo Bán Hàng';
    
    protected static ?string $navigationGroup = 'Báo cáo';

    protected static string $view = 'filament.pages.sales-report';

    public ?array $data = [];
    
    public $reportData = [];

    public function mount(): void
    {
        $this->form->fill([
            'date_from' => now()->startOfMonth(),
            'date_to' => now(),
            'report_type' => 'daily',
        ]);
        
        $this->generateReport();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('date_from')
                    ->label('Từ ngày')
                    ->required()
                    ->date('d/m/Y')
                    ->default(now()->startOfMonth()),
                    
                DatePicker::make('date_to')
                    ->label('Đến ngày')
                    ->required()
                    ->date('d/m/Y')
                    ->default(now()),
                    
                Select::make('report_type')
                    ->label('Loại báo cáo')
                    ->options([
                        'daily' => 'Theo ngày',
                        'monthly' => 'Theo tháng',
                        'customer' => 'Theo khách hàng',
                        'product' => 'Theo sản phẩm',
                    ])
                    ->default('daily')
                    ->required(),
            ])
            ->columns(3)
            ->statePath('data');
    }

    public function generateReport(): void
    {
        $data = $this->form->getState();
        
        $dateFrom = $data['date_from'];
        $dateTo = $data['date_to'];
        $reportType = $data['report_type'];

        switch ($reportType) {
            case 'daily':
                $this->reportData = $this->getDailyReport($dateFrom, $dateTo);
                break;
            case 'monthly':
                $this->reportData = $this->getMonthlyReport($dateFrom, $dateTo);
                break;
            case 'customer':
                $this->reportData = $this->getCustomerReport($dateFrom, $dateTo);
                break;
            case 'product':
                $this->reportData = $this->getProductReport($dateFrom, $dateTo);
                break;
        }
    }

    private function getDailyReport($dateFrom, $dateTo): array
    {
        return Order::whereBetween('order_date', [$dateFrom, $dateTo])
            ->where('order_status', '!=', 'cancelled')
            ->select(
                DB::raw('DATE(order_date) as date'),
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(grand_total) as total_revenue'),
                DB::raw('SUM(paid_amount) as total_paid'),
                DB::raw('SUM(debt_amount) as total_debt')
            )
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get()
            ->toArray();
    }

    private function getMonthlyReport($dateFrom, $dateTo): array
    {
        return Order::whereBetween('order_date', [$dateFrom, $dateTo])
            ->where('order_status', '!=', 'cancelled')
            ->select(
                DB::raw('YEAR(order_date) as year'),
                DB::raw('MONTH(order_date) as month'),
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(grand_total) as total_revenue'),
                DB::raw('SUM(paid_amount) as total_paid'),
                DB::raw('SUM(debt_amount) as total_debt')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->toArray();
    }

    private function getCustomerReport($dateFrom, $dateTo): array
    {
        return Order::whereBetween('order_date', [$dateFrom, $dateTo])
            ->where('order_status', '!=', 'cancelled')
            ->with('customer')
            ->select(
                'customer_id',
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(grand_total) as total_revenue'),
                DB::raw('SUM(debt_amount) as total_debt')
            )
            ->groupBy('customer_id')
            ->orderBy('total_revenue', 'desc')
            ->limit(20)
            ->get()
            ->toArray();
    }

    private function getProductReport($dateFrom, $dateTo): array
    {
        return OrderItem::whereHas('order', function($query) use ($dateFrom, $dateTo) {
                $query->whereBetween('order_date', [$dateFrom, $dateTo])
                      ->where('order_status', '!=', 'cancelled');
            })
            ->with('product')
            ->select(
                'product_id',
                DB::raw('SUM(quantity) as total_quantity'),
                DB::raw('SUM(total_price) as total_revenue')
            )
            ->groupBy('product_id')
            ->orderBy('total_revenue', 'desc')
            ->limit(20)
            ->get()
            ->toArray();
    }
}