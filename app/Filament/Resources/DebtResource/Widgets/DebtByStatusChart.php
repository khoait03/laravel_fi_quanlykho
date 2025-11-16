<?php

namespace App\Filament\Resources\DebtResource\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class DebtByStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Phân loại theo trạng thái thanh toán';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 1,
    ];

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $unpaid = Order::where('payment_status', 'unpaid')
            ->where('debt_amount', '>', 0)
            ->sum('debt_amount') / 1000000;

        $partial = Order::where('payment_status', 'partial')
            ->where('debt_amount', '>', 0)
            ->sum('debt_amount') / 1000000;

        $deposit = Order::where('payment_status', 'deposit')
            ->where('debt_amount', '>', 0)
            ->sum('debt_amount') / 1000000;

        return [
            'datasets' => [
                [
                    'label' => 'Công nợ (triệu VND)',
                    'data' => [$unpaid, $partial, $deposit],
                    'backgroundColor' => [
                        'rgb(239, 68, 68)',
                        'rgb(251, 146, 60)',
                        'rgb(59, 130, 246)',
                    ],
                ],
            ],
            'labels' => ['Chưa thanh toán', 'Thanh toán 1 phần', 'Đã đặt cọc'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) { return context.label + ": " + context.parsed + " triệu VND"; }',
                    ],
                ],
            ],
        ];
    }
}