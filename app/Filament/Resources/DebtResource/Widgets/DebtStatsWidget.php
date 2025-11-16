<?php

namespace App\Filament\Resources\DebtResource\Widgets;

use App\Models\Order;
use App\Models\PurchaseOrder;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DebtStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // Công nợ khách hàng
        $totalCustomerDebt = Order::where('debt_amount', '>', 0)->sum('debt_amount');
        $customerDebtCount = Order::where('debt_amount', '>', 0)->count();
        
        // Công nợ quá hạn (>30 ngày)
        $overdueDebt = Order::where('debt_amount', '>', 0)
            ->whereRaw('DATEDIFF(NOW(), order_date) > 30')
            ->sum('debt_amount');
        $overdueCount = Order::where('debt_amount', '>', 0)
            ->whereRaw('DATEDIFF(NOW(), order_date) > 30')
            ->count();

        // Công nợ nhà cung cấp
        $totalSupplierDebt = PurchaseOrder::where('debt_amount', '>', 0)->sum('debt_amount');
        $supplierDebtCount = PurchaseOrder::where('debt_amount', '>', 0)->count();

        // Khách hàng nợ nhiều nhất
        $topDebtor = Order::where('debt_amount', '>', 0)
            ->with('customer')
            ->orderBy('debt_amount', 'desc')
            ->first();

        return [
            Stat::make('Tổng công nợ khách hàng', number_format($totalCustomerDebt) . ' đ')
                ->description($customerDebtCount . ' đơn hàng chưa thanh toán đủ')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('danger')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make('Công nợ quá hạn', number_format($overdueDebt) . ' đ')
                ->description($overdueCount . ' đơn hàng quá hạn thanh toán (>30 ngày)')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger')
                ->chart([3, 5, 6, 8, 10, 12, 15, 18]),

            Stat::make('Công nợ nhà cung cấp', number_format($totalSupplierDebt) . ' đ')
                ->description($supplierDebtCount . ' phiếu nhập chưa thanh toán đủ')
                ->descriptionIcon('heroicon-m-building-storefront')
                ->color('warning')
                ->chart([5, 4, 6, 5, 7, 6, 8, 7]),

            Stat::make('Khách hàng nợ nhiều nhất', $topDebtor ? $topDebtor->customer?->name : 'Không có')
                ->description($topDebtor ? number_format($topDebtor->debt_amount) . ' đ' : '0 đ')
                ->descriptionIcon('heroicon-m-user')
                ->color('info'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }

    protected int | string | array $columnSpan = 'full';
}