<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\PurchaseOrder;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class StatsOverviewWidget extends BaseWidget
{
    use HasWidgetShield;
     
    protected ?string $heading = 'Tổng quan';
    protected function getStats(): array
    {
        // Tính toán doanh thu tháng này
        $currentMonthRevenue = Order::whereMonth('order_date', now()->month)
            ->whereYear('order_date', now()->year)
            ->where('order_status', '!=', 'cancelled')
            ->sum('grand_total');

        // Tính toán doanh thu tháng trước
        $lastMonthRevenue = Order::whereMonth('order_date', now()->subMonth()->month)
            ->whereYear('order_date', now()->subMonth()->year)
            ->where('order_status', '!=', 'cancelled')
            ->sum('grand_total');

        // Tính % tăng trưởng
        $revenueChange = $lastMonthRevenue > 0 
            ? (($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100 
            : 0;

        // Số đơn hàng tháng này
        $currentMonthOrders = Order::whereMonth('order_date', now()->month)
            ->whereYear('order_date', now()->year)
            ->count();

        // Tổng công nợ khách hàng
        $totalCustomerDebt = Customer::where('is_active', true)->sum('total_debt');

        // Tổng công nợ nhà cung cấp
        $totalSupplierDebt = PurchaseOrder::sum('debt_amount');

        // Số sản phẩm sắp hết hàng
        $lowStockProducts = Product::whereColumn('stock_quantity', '<=', 'min_stock_alert')
            ->where('stock_quantity', '>', 0)
            ->count();

        // Số sản phẩm hết hàng
        $outOfStockProducts = Product::where('stock_quantity', 0)->count();

        return [
            Stat::make('Doanh thu tháng này', number_format($currentMonthRevenue, 0, ',', '.') . ' ₫')
                ->description($revenueChange >= 0 ? 'Tăng ' : 'Giảm ' . number_format(abs($revenueChange), 1) . '% so với tháng trước')
                ->descriptionIcon($revenueChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($revenueChange >= 0 ? 'success' : 'danger')
                ->chart([7, 4, 6, 8, 10, 9, 12]),

            Stat::make('Đơn hàng tháng này', $currentMonthOrders)
                ->description('Đơn hàng mới trong tháng')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('info'),

            Stat::make('Công nợ khách hàng', number_format($totalCustomerDebt, 0, ',', '.') . ' ₫')
                ->description('Tổng tiền khách hàng còn nợ')
                ->descriptionIcon('heroicon-m-user-group')
                ->color($totalCustomerDebt > 0 ? 'warning' : 'success'),

            Stat::make('Công nợ nhà cung cấp', number_format($totalSupplierDebt, 0, ',', '.') . ' ₫')
                ->description('Tổng tiền cần trả NCC')
                ->descriptionIcon('heroicon-m-building-storefront')
                ->color($totalSupplierDebt > 0 ? 'danger' : 'success'),

            Stat::make('Cảnh báo tồn kho', $lowStockProducts)
                ->description('Sản phẩm sắp hết hàng')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('warning'),

            Stat::make('Hết hàng', $outOfStockProducts)
                ->description('Sản phẩm đã hết hàng')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}