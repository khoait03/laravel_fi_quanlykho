<x-filament-panels::page>
    <div class="space-y-6">
        

        {{-- Thống kê tổng quan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                <div class="fi-section-content p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Tổng khách hàng
                            </div>
                            <div class="text-3xl font-semibold tracking-tight text-gray-950 dark:text-white mt-2">
                                {{ number_format($statistics['total_customers'] ?? 0) }}
                            </div>
                        </div>
                        <div class="rounded-full bg-primary-500/10 p-3">
                            <x-heroicon-o-users class="w-6 h-6 text-primary-600 dark:text-primary-400" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                <div class="fi-section-content p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Khách hàng VIP
                            </div>
                            <div class="text-3xl font-semibold tracking-tight text-gray-950 dark:text-white mt-2">
                                {{ number_format($statistics['vip_customers'] ?? 0) }}
                            </div>
                        </div>
                        <div class="rounded-full bg-warning-500/10 p-3">
                            <x-heroicon-o-star class="w-6 h-6 text-warning-600 dark:text-warning-400" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                <div class="fi-section-content p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Khách hàng có nợ
                            </div>
                            <div class="text-3xl font-semibold tracking-tight text-gray-950 dark:text-white mt-2">
                                {{ number_format($statistics['customers_with_debt'] ?? 0) }}
                            </div>
                        </div>
                        <div class="rounded-full bg-danger-500/10 p-3">
                            <x-heroicon-o-exclamation-circle class="w-6 h-6 text-danger-600 dark:text-danger-400" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                <div class="fi-section-content p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Tổng công nợ
                            </div>
                            <div class="text-3xl font-semibold tracking-tight text-danger-600 dark:text-danger-400 mt-2">
                                {{ number_format($statistics['total_debt'] ?? 0) }} ₫
                            </div>
                        </div>
                        <div class="rounded-full bg-danger-500/10 p-3">
                            <x-heroicon-o-currency-dollar class="w-6 h-6 text-danger-600 dark:text-danger-400" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form lọc --}}
        <x-filament::section>
            <x-slot name="heading">
                Bộ lọc
            </x-slot>

            <form wire:submit.prevent="applyFilter">
                {{ $this->form }}

                <div class="mt-4" style="margin-top: 20px">
                    {{-- <x-filament::button type="submit" color="primary">
                        <x-heroicon-o-funnel class="w-5 h-5 mr-2" />
                        Áp dụng lọc
                    </x-filament::button> --}}
                    <x-filament::button type="submit" icon="heroicon-o-funnel">
                        Lọc dữ liệu
                    </x-filament::button>
                </div>
            </form>
        </x-filament::section>


        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Top khách hàng --}}
            <x-filament::section>
                <x-slot name="heading">
                    Top 10 khách hàng mua nhiều nhất
                </x-slot>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">Mã KH</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">Tên KH</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">SĐT</th>
                                <th class="px-4 py-3 text-right font-medium text-gray-700 dark:text-gray-300">Tổng mua</th>
                                <th class="px-4 py-3 text-right font-medium text-gray-700 dark:text-gray-300">Đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($statistics['top_customers'] ?? [] as $index => $customer)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">
                                            @if($index < 3)
                                                <span class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-bold
                                                    {{ $index === 0 ? 'bg-warning-100 text-warning-700 dark:bg-warning-900 dark:text-warning-300' : '' }}
                                                    {{ $index === 1 ? 'bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300' : '' }}
                                                    {{ $index === 2 ? 'bg-orange-100 text-orange-700 dark:bg-orange-900 dark:text-orange-300' : '' }}">
                                                    {{ $index + 1 }}
                                                </span>
                                            @endif
                                            <span class="text-gray-900 dark:text-white font-medium">{{ $customer['code'] }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $customer['name'] }}</td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $customer['phone'] }}</td>
                                    <td class="px-4 py-3 text-right text-success-600 dark:text-success-400 font-medium">
                                        {{ number_format($customer['total_purchased']) }} ₫
                                    </td>
                                    <td class="px-4 py-3 text-right text-gray-600 dark:text-gray-400">
                                        {{ number_format($customer['order_count']) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                        Không có dữ liệu
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-filament::section>

            {{-- Khách hàng có nợ --}}
            <x-filament::section>
                <x-slot name="heading">
                    Top 20 khách hàng có công nợ
                </x-slot>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">Mã KH</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">Tên KH</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">SĐT</th>
                                <th class="px-4 py-3 text-right font-medium text-gray-700 dark:text-gray-300">Công nợ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($statistics['debt_customers'] ?? [] as $customer)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="px-4 py-3 text-gray-900 dark:text-white font-medium">{{ $customer['code'] }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $customer['name'] }}</td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $customer['phone'] }}</td>
                                    <td class="px-4 py-3 text-right text-danger-600 dark:text-danger-400 font-bold">
                                        {{ number_format($customer['total_debt']) }} ₫
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                        Không có khách hàng nào có công nợ
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-filament::section>
        </div>
        

        {{-- Khách hàng theo loại --}}
        <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <div class="fi-section-header flex items-center gap-x-3 overflow-hidden px-6 py-4">
                <div class="grid gap-y-1 flex-1">
                    <h3 class="fi-section-header-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
                        Phân loại khách hàng
                    </h3>
                </div>
            </div>

            <div class="fi-section-content-ctn border-t border-gray-200 dark:border-white/10">
                <div class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10">
                    <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                        <thead class="divide-y divide-gray-200 dark:divide-white/5">
                            <tr class="bg-gray-50 dark:bg-white/5">
                                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-start">
                                        <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                            Loại khách hàng
                                        </span>
                                    </span>
                                </th>
                                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-end">
                                        <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                            Số lượng
                                        </span>
                                    </span>
                                </th>
                                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-end">
                                        <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                            Tổng mua hàng
                                        </span>
                                    </span>
                                </th>
                                <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    <span class="group flex w-full items-center gap-x-1 whitespace-nowrap justify-end">
                                        <span class="fi-ta-header-cell-label text-sm font-semibold text-gray-950 dark:text-white">
                                            Công nợ
                                        </span>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                            @forelse($statistics['by_type'] ?? [] as $type)
                                <tr class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5">
                                    <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                                        <div class="fi-ta-col-wrp">
                                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                                <div class="flex">
                                                    <div class="flex max-w-max">
                                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                            <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white">
                                                                {{ $type['type_name'] }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                                        <div class="fi-ta-col-wrp">
                                            <div class="flex w-full disabled:pointer-events-none justify-end text-end">
                                                <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                                    <div class="flex justify-end">
                                                        <div class="flex max-w-max">
                                                            <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white">
                                                                    {{ number_format($type['customer_count']) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                                        <div class="fi-ta-col-wrp">
                                            <div class="flex w-full disabled:pointer-events-none justify-end text-end">
                                                <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                                    <div class="flex justify-end">
                                                        <div class="flex max-w-max">
                                                            <div class="fi-ta-text-item inline-flex items-center gap-1.5 fi-color-custom fi-color-success">
                                                                <span class="fi-ta-text-item-label text-sm leading-6 text-custom-600 dark:text-custom-400" style="--c-400:var(--success-400);--c-600:var(--success-600);">
                                                                    {{ number_format($type['total_purchased']) }}&nbsp;₫
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                                        <div class="fi-ta-col-wrp">
                                            <div class="flex w-full disabled:pointer-events-none justify-end text-end">
                                                <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                                    <div class="flex justify-end">
                                                        <div class="flex max-w-max">
                                                            <div class="fi-ta-text-item inline-flex items-center gap-1.5 fi-color-custom fi-color-danger">
                                                                <span class="fi-ta-text-item-label text-sm leading-6 text-custom-600 dark:text-custom-400" style="--c-400:var(--danger-400);--c-600:var(--danger-600);">
                                                                    {{ number_format($type['total_debt']) }}&nbsp;₫
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="fi-ta-empty-state-row">
                                    <td colspan="4" class="fi-ta-empty-state-cell p-6">
                                        <div class="fi-ta-empty-state-content mx-auto grid max-w-lg justify-items-center text-center">
                                            <div class="fi-ta-empty-state-description text-sm text-gray-500 dark:text-gray-400">
                                                Không có dữ liệu
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        

        {{-- Danh sách khách hàng chi tiết --}}
        <x-filament::section>
            <x-slot name="heading">
                Danh sách khách hàng
            </x-slot>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">Mã KH</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">Tên khách hàng</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">SĐT</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700 dark:text-gray-300">Loại KH</th>
                            <th class="px-4 py-3 text-right font-medium text-gray-700 dark:text-gray-300">Tổng mua</th>
                            <th class="px-4 py-3 text-right font-medium text-gray-700 dark:text-gray-300">Công nợ</th>
                            <th class="px-4 py-3 text-right font-medium text-gray-700 dark:text-gray-300">Đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($statistics['customers'] ?? [] as $customer)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="px-4 py-3 text-gray-900 dark:text-white font-medium">{{ $customer['code'] }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $customer['name'] }}</td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $customer['phone'] }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full
                                        {{ str_contains(strtoupper($customer['type']), 'VIP') ? 'bg-warning-100 text-warning-700 dark:bg-warning-900 dark:text-warning-300' : 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-300' }}">
                                        {{ $customer['type'] }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right text-success-600 dark:text-success-400 font-medium">
                                    {{ number_format($customer['total_purchased']) }} ₫
                                </td>
                                <td class="px-4 py-3 text-right font-medium
                                    {{ $customer['total_debt'] > 0 ? 'text-danger-600 dark:text-danger-400' : 'text-gray-600 dark:text-gray-400' }}">
                                    {{ number_format($customer['total_debt']) }} ₫
                                </td>
                                <td class="px-4 py-3 text-right text-gray-600 dark:text-gray-400">
                                    {{ number_format($customer['order_count']) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                    Không có dữ liệu khách hàng
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-filament::section>
    </div>
</x-filament-panels::page>