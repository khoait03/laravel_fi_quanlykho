<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class RevenueChartWidget extends ChartWidget
{
    use HasWidgetShield;

    
    protected static ?string $heading = 'Thống kê doanh thu';
    
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public ?string $filter = '12';
    
    public string $chartType = 'line';

    protected function getData(): array
    {
        $months = (int) $this->filter;
        $data = [];
        $labels = [];

        for ($i = $months - 1; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            
            $revenue = Order::whereMonth('order_date', $date->month)
                ->whereYear('order_date', $date->year)
                ->where('order_status', '!=', 'cancelled')
                ->sum('grand_total');

            $data[] = $revenue;
            $labels[] = $date->format('M Y');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Doanh thu (VNĐ)',
                    'data' => $data,
                    'backgroundColor' => $this->chartType === 'bar' 
                        ? 'rgba(59, 130, 246, 0.5)' 
                        : 'rgba(59, 130, 246, 0.1)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'tension' => 0.3,
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return $this->chartType;
    }

    protected function getFilters(): ?array
    {
        return [
            '1' => '1 tháng',
            '2' => '2 tháng',
            '3' => '3 tháng',
            '6' => '6 tháng',
            '12' => '12 tháng',
        ];
    }
    
    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('chartType')
                ->label($this->chartType === 'line' ? 'Đường' : 'Cột')
                ->icon('heroicon-o-chart-bar')
                ->color('gray')
                ->button()
                ->extraAttributes(['wire:click' => '$set(\'chartType\', \'' . ($this->chartType === 'line' ? 'bar' : 'line') . '\')'])
        ];
    }

    public function updatedChartType(): void
    {
        $this->chartType = $this->chartType === 'line' ? 'bar' : 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'ticks' => [
                        'callback' => 'function(value) { return value.toLocaleString("vi-VN") + " ₫"; }',
                    ],
                ],
            ],
        ];
    }
}