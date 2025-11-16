<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    protected static ?string $recordTitleAttribute = 'code';

    protected static ?string $title = 'Lịch sử đơn hàng';

    protected static ?string $modelLabel = 'đơn hàng';

    protected static ?string $pluralModelLabel = 'đơn hàng';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('code')
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã đơn hàng')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold')
                    ->url(fn ($record) => route('filament.admin.resources.orders.view', ['record' => $record->id]))
                    ->color('primary'),

                Tables\Columns\TextColumn::make('order_date')
                    ->label('Ngày bán')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('items_count')
                    ->label('Số SP')
                    ->counts('items')
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Tổng tiền')
                    ->money('VND', locale: 'vi')
                    ->sortable(),

                Tables\Columns\TextColumn::make('discount_amount')
                    ->label('Giảm giá')
                    ->money('VND', locale: 'vi')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('grand_total')
                    ->label('Thanh toán')
                    ->money('VND', locale: 'vi')
                    ->sortable()
                    ->weight('bold')
                    ->color('success')
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('VND', locale: 'vi')
                            ->label('Tổng cộng'),
                    ]),

                Tables\Columns\TextColumn::make('paid_amount')
                    ->label('Đã thanh toán')
                    ->money('VND', locale: 'vi')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('debt_amount')
                    ->label('Còn nợ')
                    ->money('VND', locale: 'vi')
                    ->sortable()
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'success')
                    ->weight(fn ($state) => $state > 0 ? 'bold' : 'normal')
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('VND', locale: 'vi')
                            ->label('Tổng nợ'),
                    ]),

                

                Tables\Columns\BadgeColumn::make('order_status')
                    ->label('TT Đơn hàng')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'completed' => 'Hoàn thành',
                        'cancelled' => 'Đã hủy',
                        default => $state,
                    })
                    ->colors([
                        'warning' => 'pending',
                        'primary' => 'processing',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ]),

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
                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('Trạng thái thanh toán')
                    ->options([
                        'unpaid' => 'Chưa thanh toán',
                        'deposit' => 'Đã đặt cọc',
                        'partial' => 'Thanh toán một phần',
                        'paid' => 'Đã thanh toán',
                    ])
                    ->native(false),

                Tables\Filters\SelectFilter::make('order_status')
                    ->label('Trạng thái đơn hàng')
                    ->options([
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'completed' => 'Hoàn thành',
                        'cancelled' => 'Đã hủy',
                    ])
                    ->native(false),

                Tables\Filters\Filter::make('has_debt')
                    ->label('Có công nợ')
                    ->query(fn (Builder $query) => $query->where('debt_amount', '>', 0)),

                Tables\Filters\Filter::make('order_date')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('Từ ngày')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->format('Y-m-d'),
                        Forms\Components\DatePicker::make('until')
                            ->label('Đến ngày')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->format('Y-m-d'),
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
                    }),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tạo đơn hàng')
                    ->url(fn () => route('filament.admin.resources.orders.create', [
                        'customer_id' => $this->getOwnerRecord()->id
                    ]))
                    ->icon('heroicon-o-plus'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('view')
                        ->label('Xem')
                        ->icon('heroicon-o-eye')
                        ->url(fn ($record) => route('filament.admin.resources.orders.view', ['record' => $record->id]))
                        ->openUrlInNewTab()
                        ->color('primary'),
                    
                    Tables\Actions\Action::make('edit')
                        ->label('Sửa')
                        ->icon('heroicon-o-pencil')
                        ->url(fn ($record) => route('filament.admin.resources.orders.edit', ['record' => $record->id]))
                        ->openUrlInNewTab()
                        ->color('warning'),
                ])
                ->icon('heroicon-m-ellipsis-vertical')
                ->size('sm')
                ->color('gray')
                ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Không cho phép xóa hàng loạt đơn hàng từ đây
                ]),
            ])
            ->defaultSort('order_date', 'desc')
            ->emptyStateHeading('Chưa có đơn hàng nào')
            ->emptyStateDescription('Khách hàng này chưa có đơn hàng nào.')
            ->emptyStateIcon('heroicon-o-shopping-cart')
            ->emptyStateActions([
                Tables\Actions\Action::make('create')
                    ->label('Tạo đơn hàng đầu tiên')
                    ->url(fn () => route('filament.admin.resources.orders.create', [
                        'customer_id' => $this->getOwnerRecord()->id
                    ]))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->poll('30s'); // Tự động refresh mỗi 30 giây
    }
}