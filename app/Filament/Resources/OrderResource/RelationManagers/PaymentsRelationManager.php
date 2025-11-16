<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Lịch sử thanh toán';

    protected static ?string $modelLabel = 'thanh toán';

    protected static ?string $pluralModelLabel = 'thanh toán';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('payment_date')
                    ->label('Ngày thanh toán')
                    ->required()
                    ->default(now())
                    ->native(false)
                    ->seconds(false)
                    ->displayFormat('d/m/Y H:i')
                    ->format('Y-m-d H:i:s'),

                Forms\Components\TextInput::make('amount')
                    ->label('Số tiền thanh toán')
                    ->required()
                    ->numeric()
                    ->prefix('₫')
                    ->minValue(1)
                    ->maxValue(function () {
                        $order = $this->getOwnerRecord();
                        return $order->debt_amount;
                    })
                    ->helperText(function () {
                        $order = $this->getOwnerRecord();
                        return 'Còn nợ: ' . number_format($order->debt_amount, 0, ',', '.') . ' ₫';
                    }),

                Forms\Components\Select::make('payment_method')
                    ->label('Phương thức thanh toán')
                    ->options([
                        'cash' => 'Tiền mặt',
                        'bank_transfer' => 'Chuyển khoản',
                        'card' => 'Thẻ',
                        'e_wallet' => 'Ví điện tử',
                        'other' => 'Khác',
                    ])
                    ->required()
                    ->default('cash')
                    ->native(false),

                Forms\Components\Textarea::make('notes')
                    ->label('Ghi chú')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('payment_date')
                    ->label('Ngày thanh toán')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Số tiền')
                    ->money('VND', locale: 'vi')
                    ->sortable()
                    ->weight('bold')
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('VND', locale: 'vi')
                            ->label('Tổng đã thanh toán'),
                    ]),

                Tables\Columns\BadgeColumn::make('payment_method')
                    ->label('Phương thức')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'cash' => 'Tiền mặt',
                        'bank_transfer' => 'Chuyển khoản',
                        'card' => 'Thẻ',
                        'e_wallet' => 'Ví điện tử',
                        'other' => 'Khác',
                        default => $state,
                    })
                    ->colors([
                        'success' => 'cash',
                        'primary' => 'bank_transfer',
                        'warning' => 'card',
                        'info' => 'e_wallet',
                        'secondary' => 'other',
                    ]),

                Tables\Columns\TextColumn::make('notes')
                    ->label('Ghi chú')
                    ->limit(50)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Người tạo')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('payment_method')
                    ->label('Phương thức')
                    ->options([
                        'cash' => 'Tiền mặt',
                        'bank_transfer' => 'Chuyển khoản',
                        'card' => 'Thẻ',
                        'e_wallet' => 'Ví điện tử',
                        'other' => 'Khác',
                    ])
                    ->native(false),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Thêm thanh toán')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['created_by'] = auth()->id();
                        return $data;
                    })
                    ->before(function (Tables\Actions\CreateAction $action, array $data) {
                        $order = $this->getOwnerRecord();
                        
                        // Kiểm tra số tiền thanh toán không vượt quá số nợ
                        if ($data['amount'] > $order->debt_amount) {
                            Notification::make()
                                ->danger()
                                ->title('Lỗi thanh toán')
                                ->body('Số tiền thanh toán không được vượt quá số nợ còn lại: ' . number_format($order->debt_amount, 0, ',', '.') . ' ₫')
                                ->persistent()
                                ->send();
                            
                            $action->halt();
                        }
                    })
                    ->after(function () {
                        Notification::make()
                            ->success()
                            ->title('Thanh toán thành công')
                            ->body('Đã ghi nhận thanh toán')
                            ->send();
                    })
                    ->successNotification(null),
            ])
            ->actions([

                Tables\Actions\ActionGroup::make([
                    
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->mutateFormDataUsing(function (array $data): array {
                            $data['created_by'] = auth()->id();
                            return $data;
                        })
                        ->after(function () {
                            Notification::make()
                                ->success()
                                ->title('Cập nhật thành công')
                                ->send();
                        }),
                    Tables\Actions\DeleteAction::make()
                        ->after(function () {
                            Notification::make()
                                ->success()
                                ->title('Xóa thành công')
                                ->send();
                        }),

                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('payment_date', 'desc')
            ->emptyStateHeading('Chưa có thanh toán nào')
            ->emptyStateDescription('Thêm thanh toán đầu tiên cho đơn hàng này')
            ->emptyStateIcon('heroicon-o-credit-card');
    }
}