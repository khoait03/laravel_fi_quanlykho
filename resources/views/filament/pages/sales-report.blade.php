<x-filament-panels::page>
    <div class="space-y-6">
        <!-- Form Filter -->
        <x-filament::section>
            <x-slot name="heading">
                Tùy Chọn Báo Cáo
            </x-slot>
            
            <form wire:submit="generateReport">
                {{ $this->form }}
                
                <div class="mt-6">
                    <x-filament::button type="submit" icon="heroicon-o-chart-bar">
                        Tạo Báo Cáo
                    </x-filament::button>
                </div>
            </form>
        </x-filament::section>

        <!-- Report Results -->
        @if(count($reportData) > 0)
            <x-filament::section>
                <x-slot name="heading">
                    Kết Quả Báo Cáo
                </x-slot>

                <div class="overflow-x-auto">
                    @if($data['report_type'] === 'daily')
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Ngày</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Số đơn</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Doanh thu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Đã thu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Công nợ</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($reportData as $row)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ \Carbon\Carbon::parse($row['date'])->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ number_format($row['total_orders']) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ number_format($row['total_revenue']) }} ₫</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">{{ number_format($row['total_paid']) }} ₫</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600">{{ number_format($row['total_debt']) }} ₫</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-gray-50 dark:bg-gray-800 font-bold">
                                <tr>
                                    <td class="px-6 py-4 text-sm">Tổng cộng</td>
                                    <td class="px-6 py-4 text-sm">{{ number_format(array_sum(array_column($reportData, 'total_orders'))) }}</td>
                                    <td class="px-6 py-4 text-sm">{{ number_format(array_sum(array_column($reportData, 'total_revenue'))) }} ₫</td>
                                    <td class="px-6 py-4 text-sm text-green-600">{{ number_format(array_sum(array_column($reportData, 'total_paid'))) }} ₫</td>
                                    <td class="px-6 py-4 text-sm text-red-600">{{ number_format(array_sum(array_column($reportData, 'total_debt'))) }} ₫</td>
                                </tr>
                            </tfoot>
                        </table>

                    @elseif($data['report_type'] === 'customer')
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Khách hàng</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Số đơn</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Doanh thu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Công nợ</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($reportData as $row)
                                    <tr>
                                        <td class="px-6 py-4 text-sm">{{ $row['customer']['name'] ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-sm">{{ number_format($row['total_orders']) }}</td>
                                        <td class="px-6 py-4 text-sm">{{ number_format($row['total_revenue']) }} ₫</td>
                                        <td class="px-6 py-4 text-sm text-red-600">{{ number_format($row['total_debt']) }} ₫</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @elseif($data['report_type'] === 'product')
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Sản phẩm</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Số lượng bán</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($reportData as $row)
                                    <tr>
                                        <td class="px-6 py-4 text-sm">{{ $row['product']['name'] ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-sm">{{ number_format($row['total_quantity']) }}</td>
                                        <td class="px-6 py-4 text-sm">{{ number_format($row['total_revenue']) }} ₫</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </x-filament::section>
        @else
            <x-filament::section>
                <div class="text-center py-8">
                    <p class="text-gray-500 dark:text-gray-400">Chưa có dữ liệu báo cáo. Vui lòng chọn thời gian và loại báo cáo.</p>
                </div>
            </x-filament::section>
        @endif
    </div>
</x-filament-panels::page>