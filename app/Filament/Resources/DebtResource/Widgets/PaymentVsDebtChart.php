<?php

namespace App\Filament\Resources\DebtResource\Widgets;

use App\Models\Order;
use App\Models\OrderPayment;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PaymentVsDebtChart extends ChartWidget
{
    protected static ?string $heading = 'Thu tiền vs Phát sinh công nợ (30 ngày)';

    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Tổng tiền thu trong 30 ngày
        $payments = Trend::model(OrderPayment::class)
            ->between(
                start: now()->subDays(30),
                end: now(),
            )
            ->perDay()
            ->sum('amount');

        // Công nợ phát sinh trong 30 ngày
        $newDebts = Trend::query(
            Order::query()
                ->where('debt_amount', '>', 0)
        )
            ->between(
                start: now()->subDays(30),
                end: now(),
            )
            ->perDay()
            ->sum('debt_amount');

        return [
            'datasets' => [
                [
                    'label' => 'Tiền thu',
                    'data' => $payments->map(fn (TrendValue $value) => $value->aggregate / 1000000),
                    'borderColor' => 'rgb(34, 197, 94)',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Công nợ phát sinh',
                    'data' => $newDebts->map(fn (TrendValue $value) => $value->aggregate / 1000000),
                    'borderColor' => 'rgb(239, 68, 68)',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $payments->map(fn (TrendValue $value) => date('d/m', strtotime($value->date))),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) { return context.dataset.label + ": " + context.parsed.y.toFixed(2) + " triệu VND"; }',
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
            ],
        ];
    }
}