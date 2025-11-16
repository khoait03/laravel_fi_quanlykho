<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderPaymentResource\Pages;
use App\Models\OrderPayment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Support\Enums\MaxWidth;

class OrderPaymentResource extends Resource
{
    protected static ?string $model = OrderPayment::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    
    protected static ?string $navigationLabel = 'Lịch sử thanh toán';
    
    protected static ?string $modelLabel = 'Thanh toán đơn hàng';
    
    protected static ?string $pluralModelLabel = 'Lịch sử thanh toán của khách hàng';
    
    protected static ?string $navigationGroup = 'Quản lý lịch sử';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Form chỉ để xem, không cần các field nhập liệu
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.code')
                    ->label('Mã đơn hàng')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->url(fn ($record) => route('filament.admin.resources.orders.view', $record->order_id))
                    ->color('primary')
                    ->weight('bold'),
                    
                Tables\Columns\TextColumn::make('order.customer.name')
                    ->label('Khách hàng')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                    
                Tables\Columns\TextColumn::make('payment_date')
                    ->label('Ngày thanh toán')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('amount')
                    ->label('Số tiền')
                    ->money('VND')
                    ->sortable()
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('VND')
                            ->label('Tổng')
                    ]),
                    
                Tables\Columns\BadgeColumn::make('payment_method')
                    ->label('Phương thức')
                    ->formatStateUsing(fn ($state) => match($state) {
                        'cash' => 'Tiền mặt',
                        'bank_transfer' => 'Chuyển khoản',
                        'card' => 'Thẻ',
                        'e_wallet' => 'Ví điện tử',
                        'other' => 'Khác',
                        default => 'Không xác định',
                    })
                    ->colors([
                        'success' => 'cash',
                        'info' => 'bank_transfer',
                        'warning' => 'card',
                        'primary' => 'e_wallet',
                        'gray' => 'other',
                    ]),
                    
                Tables\Columns\TextColumn::make('notes')
                    ->label('Ghi chú')
                    ->limit(40)
                    ->toggleable()
                    ->wrap(),
                    
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Người tạo')
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('order_id')
                    ->label('Đơn hàng')
                    ->relationship('order', 'code')
                    ->searchable()
                    ->preload(),
                    
                Tables\Filters\SelectFilter::make('payment_method')
                    ->label('Phương thức thanh toán')
                    ->options([
                        'cash' => 'Tiền mặt',
                        'bank_transfer' => 'Chuyển khoản',
                        'card' => 'Thẻ',
                        'e_wallet' => 'Ví điện tử',
                        'other' => 'Khác',
                    ]),
                    
                Tables\Filters\Filter::make('payment_date')
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
                                fn (Builder $query, $date): Builder => $query->whereDate('payment_date', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('payment_date', '<=', $date),
                            );
                    }),
                    
                Tables\Filters\Filter::make('amount')
                    ->form([
                        Forms\Components\TextInput::make('min_amount')
                            ->label('Số tiền tối thiểu')
                            ->numeric()
                            ->prefix('₫'),
                        Forms\Components\TextInput::make('max_amount')
                            ->label('Số tiền tối đa')
                            ->numeric()
                            ->prefix('₫'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min_amount'],
                                fn (Builder $query, $amount): Builder => $query->where('amount', '>=', $amount),
                            )
                            ->when(
                                $data['max_amount'],
                                fn (Builder $query, $amount): Builder => $query->where('amount', '<=', $amount),
                            );
                    }),
                ], Tables\Enums\FiltersLayout::Modal)
                ->filtersFormWidth(MaxWidth::ExtraLarge)
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Không có bulk actions vì chỉ xem
            ])
            ->defaultSort('payment_date', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderPayments::route('/'),
            'view' => Pages\ViewOrderPayment::route('/{record}'),
        ];
    }
    
    public static function canCreate(): bool
    {
        return false; // Không cho phép tạo mới từ đây
    }
    
    public static function canEdit($record): bool
    {
        return false; // Không cho phép sửa
    }
    
    public static function canDelete($record): bool
    {
        return false; // Không cho phép xóa
    }
}