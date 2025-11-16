<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DebtResource\Pages;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Summarizers\Sum;

class DebtResource extends Resource
{
    protected static ?string $model = null;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Công nợ khách hàng';

    protected static ?string $modelLabel = 'Công nợ khách hàng';

    protected static ?string $pluralModelLabel = 'Quản lý công nợ';

    protected static ?string $navigationGroup = 'Tài chính';

    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Order::query()
                    ->where('debt_amount', '>', 0)
                    ->with(['customer', 'payments'])
            )
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã đơn')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->color('primary'),

                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Khách hàng')
                    ->searchable()
                    ->sortable()
                    ->description(fn (Order $record): string => $record->customer?->phone ?? ''),

                Tables\Columns\TextColumn::make('order_date')
                    ->label('Ngày bán')
                    ->date('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('grand_total')
                    ->label('Tổng tiền')
                    ->money('VND')
                    ->sortable()
                    ->summarize(Sum::make()->money('VND')->label('Tổng')),

                Tables\Columns\TextColumn::make('paid_amount')
                    ->label('Đã thanh toán')
                    ->money('VND')
                    ->sortable()
                    ->color('success')
                    ->summarize(Sum::make()->money('VND')->label('Tổng')),

                Tables\Columns\TextColumn::make('debt_amount')
                    ->label('Còn nợ')
                    ->money('VND')
                    ->sortable()
                    ->color('danger')
                    ->weight(FontWeight::Bold)
                    ->summarize(Sum::make()->money('VND')->label('Tổng')),

                // Tables\Columns\TextColumn::make('payment_status')
                //     ->label('Trạng thái')
                //     ->badge()
                //     ->color(fn (string $state): string => match ($state) {
                //         'paid' => 'success',
                //         'partial' => 'warning',
                //         'deposit' => 'info',
                //         'unpaid' => 'danger',
                //     })
                //     ->formatStateUsing(fn (string $state): string => match ($state) {
                //         'paid' => 'Đã thanh toán',
                //         'partial' => 'Thanh toán 1 phần',
                //         'deposit' => 'Đã đặt cọc',
                //         'unpaid' => 'Chưa thanh toán',
                //     }),

                Tables\Columns\TextColumn::make('days_overdue')
                    ->label('Hạn')
                    ->getStateUsing(function (Order $record): int {
                        $orderDate = \Carbon\Carbon::parse($record->order_date);
                        $today = \Carbon\Carbon::now();
                        $daysOverdue = $today->diffInDays($orderDate);
                        return $daysOverdue > 30 ? $daysOverdue : 0;
                    })
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state == 0 => 'success',
                        $state <= 7 => 'warning',
                        $state <= 30 => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (int $state): string => $state > 0 ? "{$state} ngày" : 'Trong hạn')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('customer_id')
                    ->label('Khách hàng')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('Trạng thái thanh toán')
                    ->options([
                        'unpaid' => 'Chưa thanh toán',
                        'partial' => 'Thanh toán 1 phần',
                        'deposit' => 'Đã đặt cọc',
                    ]),

                Tables\Filters\Filter::make('overdue')
                    ->label('Quá hạn thanh toán')
                    ->query(fn (Builder $query): Builder => 
                        $query->whereRaw('DATEDIFF(NOW(), order_date) > 30')
                    )
                    ->toggle(),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('Từ ngày'),
                        Forms\Components\DatePicker::make('until')
                            ->label('Đến ngày'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('order_date', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('order_date', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['from'] ?? null) {
                            $indicators[] = 'Từ ngày ' . \Carbon\Carbon::parse($data['from'])->format('d/m/Y');
                        }
                        if ($data['until'] ?? null) {
                            $indicators[] = 'Đến ngày ' . \Carbon\Carbon::parse($data['until'])->format('d/m/Y');
                        }
                        return $indicators;
                    }),
            ])
            ->actions([

                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('add_payment')
                        ->label('Thanh toán')
                        ->icon('heroicon-o-banknotes')
                        ->color('success')
                        ->form([
                            Forms\Components\DateTimePicker::make('payment_date')
                                ->label('Ngày thanh toán')
                                ->default(now())
                                ->required()
                                ->native(false)
                                ->displayFormat('d/m/Y H:i')
                                ->format('Y-m-d H:i'),

                            Forms\Components\TextInput::make('amount')
                                ->label('Số tiền thanh toán')
                                ->required()
                                ->numeric()
                                ->prefix('VND')
                                ->maxValue(fn (Order $record) => $record->debt_amount)
                                ->helperText(fn (Order $record) => 'Số tiền còn nợ: ' . number_format($record->debt_amount) . ' VND'),

                            Forms\Components\Select::make('payment_method')
                                ->label('Phương thức thanh toán')
                                ->options([
                                    'cash' => 'Tiền mặt',
                                    'bank_transfer' => 'Chuyển khoản',
                                    'card' => 'Thẻ',
                                    'e_wallet' => 'Ví điện tử',
                                    'other' => 'Khác',
                                ])
                                ->default('cash')
                                ->required(),

                            Forms\Components\Textarea::make('notes')
                                ->label('Ghi chú')
                                ->rows(2),
                        ])
                        ->action(function (Order $record, array $data): void {
                            // Tạo payment mới
                            $record->payments()->create([
                                'payment_date' => $data['payment_date'],
                                'amount' => $data['amount'],
                                'payment_method' => $data['payment_method'],
                                'notes' => $data['notes'] ?? null,
                                'created_by' => auth()->id(),
                            ]);

                            // Cập nhật tổng đã thanh toán và còn nợ
                            $newPaidAmount = $record->paid_amount + $data['amount'];
                            $newDebtAmount = $record->grand_total - $newPaidAmount;

                            $record->update([
                                'paid_amount' => $newPaidAmount,
                                'debt_amount' => $newDebtAmount,
                                'payment_status' => $newDebtAmount <= 0 ? 'paid' : 'partial',
                            ]);

                            // Cập nhật công nợ khách hàng
                            if ($record->customer) {
                                $totalDebt = Order::where('customer_id', $record->customer_id)
                                    ->sum('debt_amount');
                                $record->customer->update(['total_debt' => $totalDebt]);
                            }
                        })
                        ->successNotificationTitle('Thanh toán thành công')
                        ->visible(fn (Order $record): bool => $record->debt_amount > 0),

                            Tables\Actions\ViewAction::make()
                                ->url(fn (Order $record): string => route('filament.admin.resources.orders.view', ['record' => $record])),
                        ])
                        ->icon('heroicon-m-ellipsis-vertical')
                        ->size('sm')
                        ->color('gray')
                        ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('export_debts')
                        ->label('Xuất báo cáo công nợ')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('success')
                        ->action(function () {
                            // Logic xuất báo cáo
                        }),
                ]),
            ])
            ->defaultSort('order_date', 'desc')
            ->poll('30s');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDebts::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $totalDebt = Order::where('debt_amount', '>', 0)->sum('debt_amount');
        return number_format($totalDebt / 1000000, 1) . 'M';
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}