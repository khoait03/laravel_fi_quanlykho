<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Đơn hàng';

    protected static ?string $modelLabel = 'Đơn hàng';

    protected static ?string $pluralModelLabel = 'Đơn hàng';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Thông tin đơn hàng')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('code')
                                    ->label('Mã đơn hàng')
                                    ->disabled()
                                    ->dehydrated(false)
                                    ->placeholder('Tự động tạo'),

                                Forms\Components\DatePicker::make('order_date')
                                    ->label('Ngày bán')
                                    ->required()
                                    ->default(now())
                                    ->native(false)
                                    ->displayFormat('d/m/Y')
                                    ->format('Y-m-d'),

                                Forms\Components\Select::make('customer_id')
                                    ->label('Khách hàng')
                                    ->relationship('customer', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Tên khách hàng')
                                            ->required(),
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Số điện thoại')
                                            ->tel(),
                                    ])
                                    ->nullable()
                                    ->helperText('Để trống nếu khách vãng lai'),
                            ]),
                    ]),

                Section::make('Sản phẩm')
                    ->schema([
                        Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->label('Sản phẩm')
                                    ->options(Product::active()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Set $set) {
                                        $product = Product::find($state);
                                        if ($product) {
                                            $set('unit_price', $product->retail_price);
                                            $set('quantity', 1);
                                        }
                                    })
                                    ->columnSpan(4),

                                Forms\Components\TextInput::make('quantity')
                                    ->label('Số lượng')
                                    ->numeric()
                                    ->required()
                                    ->default(1)
                                    ->minValue(1)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        $set('total_price', $state * $get('unit_price'));
                                    })
                                    ->columnSpan(2),

                                Forms\Components\TextInput::make('unit_price')
                                    ->label('Đơn giá')
                                    ->numeric()
                                    ->required()
                                    ->prefix('₫')
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        $set('total_price', $state * $get('quantity'));
                                    })
                                    ->columnSpan(3),

                                Forms\Components\TextInput::make('total_price')
                                    ->label('Thành tiền')
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated()
                                    ->prefix('₫')
                                    ->columnSpan(3),
                            ])
                            ->columns(12)
                            ->defaultItems(1)
                            ->reorderable(false)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => Product::find($state['product_id'])?->name ?? 'Sản phẩm mới')
                            ->addActionLabel('Thêm sản phẩm')
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                self::updateTotals($get, $set);
                            })
                            ->deleteAction(
                                fn (Forms\Components\Actions\Action $action) => $action->after(fn (Get $get, Set $set) => self::updateTotals($get, $set)),
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Thanh toán')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('total_amount')
                                    ->label('Tổng tiền')
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated()
                                    ->prefix('₫')
                                    ->default(0),

                                Forms\Components\TextInput::make('discount_amount')
                                    ->label('Giảm giá')
                                    ->numeric()
                                    ->prefix('₫')
                                    ->default(0)
                                    ->minValue(0)
                                    ->reactive()
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        self::updateTotals($get, $set);
                                    }),

                                Forms\Components\TextInput::make('grand_total')
                                    ->label('Tổng thanh toán')
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated()
                                    ->prefix('₫')
                                    ->default(0),

                                Forms\Components\TextInput::make('deposit_amount')
                                    ->label('Tiền đặt cọc')
                                    ->numeric()
                                    ->prefix('₫')
                                    ->default(0)
                                    ->minValue(0),

                                Forms\Components\Select::make('payment_status')
                                    ->label('Trạng thái thanh toán')
                                    ->options([
                                        'unpaid' => 'Chưa thanh toán',
                                        'deposit' => 'Đã đặt cọc',
                                        'partial' => 'Thanh toán một phần',
                                        'paid' => 'Đã thanh toán',
                                    ])
                                    ->required()
                                    ->default('unpaid')
                                    ->native(false),

                                Forms\Components\Select::make('order_status')
                                    ->label('Trạng thái đơn hàng')
                                    ->options([
                                        'pending' => 'Chờ xử lý',
                                        'processing' => 'Đang xử lý',
                                        'completed' => 'Hoàn thành',
                                        'cancelled' => 'Đã hủy',
                                    ])
                                    ->required()
                                    ->default('pending')
                                    ->native(false),
                            ]),

                        Forms\Components\Textarea::make('notes')
                            ->label('Ghi chú')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    // Hàm tính tổng tiền
    protected static function updateTotals(Get $get, Set $set): void
    {
        $items = $get('items') ?? [];
        
        $subtotal = collect($items)->sum('total_price');
        $discount = $get('discount_amount') ?? 0;
        $grandTotal = $subtotal - $discount;

        $set('total_amount', $subtotal);
        $set('grand_total', $grandTotal);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã đơn hàng')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Khách hàng')
                    ->searchable()
                    ->sortable()
                    ->default('Khách vãng lai')
                    ->icon('heroicon-m-user'),

                Tables\Columns\TextColumn::make('order_date')
                    ->label('Ngày bán')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('grand_total')
                    ->label('Tổng tiền')
                    ->money('VND', locale: 'vi')
                    ->sortable()
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('VND', locale: 'vi'),
                    ]),

                Tables\Columns\TextColumn::make('paid_amount')
                    ->label('Đã thanh toán')
                    ->money('VND', locale: 'vi')
                    ->sortable(),

                Tables\Columns\TextColumn::make('debt_amount')
                    ->label('Còn nợ')
                    ->money('VND', locale: 'vi')
                    ->sortable()
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'success'),

                Tables\Columns\BadgeColumn::make('payment_status')
                    ->label('TT Thanh toán')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'unpaid' => 'Chưa TT',
                        'deposit' => 'Đã cọc',
                        'partial' => 'TT một phần',
                        'paid' => 'Đã TT',
                        default => $state,
                    })
                    ->colors([
                        'danger' => 'unpaid',
                        'warning' => ['deposit', 'partial'],
                        'success' => 'paid',
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

                Tables\Filters\Filter::make('order_date')
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
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PaymentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}