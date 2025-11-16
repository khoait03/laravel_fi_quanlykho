<?php

namespace App\Filament\Resources\DebtResource\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TopDebtorsChart extends ChartWidget
{
    protected static ?string $heading = 'Top 10 khách hàng nợ nhiều nhất';

    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 1,
    ];

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $topDebtors = Order::where('debt_amount', '>', 0)
            ->select('customer_id', DB::raw('SUM(debt_amount) as total_debt'))
            ->groupBy('customer_id')
            ->with('customer:id,name')
            ->orderByDesc('total_debt')
            ->limit(10)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Công nợ (triệu VND)',
                    'data' => $topDebtors->map(fn ($item) => $item->total_debt / 1000000),
                    'backgroundColor' => 'rgba(239, 68, 68, 0.8)',
                    'borderColor' => 'rgb(239, 68, 68)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $topDebtors->map(fn ($item) => 
                $item->customer ? 
                    (strlen($item->customer->name) > 15 ? 
                        substr($item->customer->name, 0, 15) . '...' : 
                        $item->customer->name) : 
                    'Khách lẻ'
            ),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) { return context.parsed.y.toFixed(2) + " triệu VND"; }',
                    ],
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'callback' => 'function(value) { return value + "M"; }',
                    ],
                ],
                'x' => [
                    'ticks' => [
                        'maxRotation' => 45,
                        'minRotation' => 45,
                    ],
                ],
            ],
        ];
    }
}