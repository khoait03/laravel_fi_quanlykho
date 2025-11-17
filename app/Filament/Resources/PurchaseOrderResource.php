<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurchaseOrderResource\Pages;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;

class PurchaseOrderResource extends Resource
{
    protected static ?string $model = PurchaseOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    
    protected static ?string $navigationLabel = 'Phiếu nhập hàng';
    
    protected static ?string $modelLabel = 'Phiếu nhập hàng';
    
    protected static ?string $pluralModelLabel = 'Phiếu nhập hàng';
    
    protected static ?string $navigationGroup = 'Quản lý kho';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Thông tin phiếu nhập')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('code')
                                    ->label('Mã phiếu nhập')
                                    ->default(fn () => PurchaseOrder::generateCode())
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(100)
                                    ->unique(ignoreRecord: true),
                                    
                                Forms\Components\Select::make('supplier_id')
                                    ->label('Nhà cung cấp')
                                    ->relationship(
                                        name: 'supplier',
                                        titleAttribute: 'name',
                                        modifyQueryUsing: fn ($query) => $query->orderBy('name')
                                    )
                                    ->searchable(['name', 'code', 'phone'])
                                    ->preload()
                                    ->required()
                                    ->getOptionLabelFromRecordUsing(function ($record) {
                                        $label = $record->name;
                                        if ($record->code) {
                                            $label = "{$record->code} - {$label}";
                                        }
                                        if ($record->phone) {
                                            $label .= " - {$record->phone}";
                                        }
                                        return $label;
                                    })
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Tên NCC')
                                            ->required(),
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Số điện thoại')
                                            ->tel(),
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->email(),
                                    ]),
                                
                                Forms\Components\DatePicker::make('purchase_date')
                                    ->label('Ngày nhập')
                                    ->default(now())
                                    ->required()
                                    ->displayFormat('d/m/Y')
                                    ->format('Y-m-d')
                                    ->native(false),
                            ]),
                    ]),


                    
                    

                Section::make('Sản phẩm')
                    ->schema([
                        Repeater::make('items')
                            ->label('Danh sách sản phẩm cần nhập')
                            ->relationship()
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->label('Sản phẩm')
                                    // ->options(Product::query()->pluck('name', 'id'))
                                    ->options(function () {
                                        return Product::query()
                                            ->get()
                                            ->mapWithKeys(function ($product) {
                                                return [$product->id => $product->code . ' - ' . $product->name];
                                            });
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Set $set) {
                                        $product = Product::find($state);
                                        if ($product) {
                                            $set('unit_price', $product->purchase_price);
                                        }
                                    })
                                    ->columnSpan(3),
                                    
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
                                    ->columnSpan(1),
                                    
                                Forms\Components\TextInput::make('unit_price')
                                    ->label('Đơn giá')
                                    ->numeric()
                                    ->required()
                                    ->prefix('₫')
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        $set('total_price', $state * $get('quantity'));
                                    })
                                    ->columnSpan(2),
                                    
                                Forms\Components\TextInput::make('total_price')
                                    ->label('Thành tiền')
                                    ->numeric()
                                    ->prefix('₫')
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(2),
                            ])
                            ->columns(8)
                            ->defaultItems(1)
                            ->reorderable(false)
                            ->addActionLabel('Thêm sản phẩm')
                            ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                                $data['total_price'] = $data['quantity'] * $data['unit_price'];
                                return $data;
                            })
                            ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
                                $data['total_price'] = $data['quantity'] * $data['unit_price'];
                                return $data;
                            }),
                    ]),

                Section::make('Chi phí và thanh toán')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('shipping_fee')
                                    ->label('Phí vận chuyển')
                                    ->numeric()
                                    ->default(0)
                                    ->prefix('₫'),
                                    
                                Forms\Components\TextInput::make('other_fees')
                                    ->label('Chi phí khác')
                                    ->numeric()
                                    ->default(0)
                                    ->prefix('₫'),
                                    
                                Forms\Components\TextInput::make('paid_amount')
                                    ->label('Đã thanh toán')
                                    ->numeric()
                                    ->default(0)
                                    ->prefix('₫')
                                    ->helperText('Số tiền đã thanh toán cho NCC'),
                            ]),
                            
                        Forms\Components\Textarea::make('notes')
                            ->label('Ghi chú')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã phiếu')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),
                    
                Tables\Columns\TextColumn::make('supplier.name')
                    ->label('Nhà cung cấp')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                    
                Tables\Columns\TextColumn::make('purchase_date')
                    ->label('Ngày nhập')
                    ->date('d/m/Y')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('grand_total')
                    ->label('Tổng cộng')
                    ->money('VND')
                    ->sortable()
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('VND')
                            ->label('Tổng')
                    ]),
                    
                Tables\Columns\TextColumn::make('paid_amount')
                    ->label('Đã trả')
                    ->money('VND')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('debt_amount')
                    ->label('Còn nợ')
                    ->money('VND')
                    ->sortable()
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'success'),
                    
                Tables\Columns\BadgeColumn::make('payment_status')
                    ->label('Trạng thái')
                    ->formatStateUsing(fn ($state) => match($state) {
                        'paid' => 'Đã thanh toán',
                        'partial' => 'Thanh toán 1 phần',
                        'unpaid' => 'Chưa thanh toán',
                        default => 'Không xác định',
                    })
                    ->colors([
                        'success' => 'paid',
                        'warning' => 'partial',
                        'danger' => 'unpaid',
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
                Tables\Filters\SelectFilter::make('supplier_id')
                    ->label('Nhà cung cấp')
                    ->relationship('supplier', 'name')
                    ->searchable()
                    ->preload(),
                    
                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('Trạng thái thanh toán')
                    ->options([
                        'paid' => 'Đã thanh toán',
                        'partial' => 'Thanh toán 1 phần',
                        'unpaid' => 'Chưa thanh toán',
                    ]),
                    
                Tables\Filters\Filter::make('purchase_date')
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
                                fn (Builder $query, $date): Builder => $query->whereDate('purchase_date', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('purchase_date', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('updateStock')
                        ->label('Cập nhật kho')
                        ->icon('heroicon-o-arrow-path')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Cập nhật tồn kho')
                        ->modalDescription('Bạn có chắc muốn cập nhật tồn kho từ phiếu nhập này? Sau khi xác nhận số lượng sẽ được cộng trực tiếp vào số lượng tồn kho của sản phẩm')
                        ->action(function (PurchaseOrder $record) {
                            $record->updateProductStock();
                            
                            \Filament\Notifications\Notification::make()
                                ->success()
                                ->title('Cập nhật thành công')
                                ->body('Tồn kho đã được cập nhật từ phiếu nhập.')
                                ->send();
                        }),
                        // ->visible(fn () => auth()->user()->can('update_stock')),
                        
                    Tables\Actions\DeleteAction::make(),
                ])
                ->icon('heroicon-m-ellipsis-vertical')
                ->size('sm')
                ->color('gray')
                ->button(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPurchaseOrders::route('/'),
            'create' => Pages\CreatePurchaseOrder::route('/create'),
            'view' => Pages\ViewPurchaseOrder::route('/{record}'),
            'edit' => Pages\EditPurchaseOrder::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('payment_status', 'unpaid')->count();
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}