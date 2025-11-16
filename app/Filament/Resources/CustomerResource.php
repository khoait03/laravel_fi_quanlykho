<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use App\Models\CustomerType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Khách hàng';

    protected static ?string $modelLabel = 'Khách hàng';

    protected static ?string $pluralModelLabel = 'Khách hàng';

    protected static ?string $navigationGroup = 'Quản lý khách hàng';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin khách hàng')
                    ->schema([
                        Forms\Components\TextInput::make('code')
                            ->label('Mã khách hàng')
                            ->unique(ignoreRecord: true)
                            ->maxLength(50)
                            ->placeholder('Để trống để tự động tạo')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('name')
                            ->label('Họ và tên')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nhập họ tên khách hàng')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('phone')
                            ->label('Số điện thoại')
                            ->required()
                            ->tel()
                            ->maxLength(20)
                            ->placeholder('0123456789')
                            ->columnSpan(1),

                        Forms\Components\Select::make('customer_type_id')
                            ->label('Loại khách hàng')
                            ->relationship('customerType', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Tên loại')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('description')
                                    ->label('Mô tả')
                                    ->rows(3),
                            ])
                            ->columnSpan(1),

                        Forms\Components\Toggle::make('is_walk_in')
                            ->label('Khách vãng lai')
                            ->default(false)
                            ->helperText('Khách hàng không cần thông tin chi tiết')
                            ->inline(false)
                            ->columnSpan(1),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Đang hoạt động')
                            ->default(true)
                            ->inline(false)
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Liên hệ và địa chỉ')
                    ->schema([
                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook')
                            ->maxLength(255)
                            ->placeholder('Link Facebook hoặc tên tài khoản')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('zalo')
                            ->label('Zalo')
                            ->maxLength(255)
                            ->placeholder('Số Zalo hoặc tên tài khoản')
                            ->columnSpan(1),

                        Forms\Components\Textarea::make('address')
                            ->label('Địa chỉ')
                            ->rows(3)
                            ->placeholder('Nhập địa chỉ đầy đủ')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('notes')
                            ->label('Ghi chú')
                            ->rows(3)
                            ->placeholder('Ghi chú thêm về khách hàng')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible(),

                // Forms\Components\Section::make('Thống kê mua hàng')
                //     ->schema([
                //         Forms\Components\TextInput::make('total_purchased')
                //             ->label('Tổng tiền đã mua (VND)')
                //             ->numeric()
                //             ->default(0)
                //             ->suffix('₫')
                //             ->disabled()
                //             ->dehydrated(false)
                //             ->columnSpan(1),

                //         Forms\Components\TextInput::make('total_debt')
                //             ->label('Tổng công nợ (VND)')
                //             ->numeric()
                //             ->default(0)
                //             ->suffix('₫')
                //             ->helperText('Số tiền khách hàng còn nợ')
                //             ->columnSpan(1),
                //     ])
                //     ->columns(2)
                //     ->collapsible(),


                        Forms\Components\Section::make('Thống kê mua hàng')
                            ->schema([
                                Forms\Components\Placeholder::make('total_purchased_display')
                                    ->label('Tổng tiền đã mua')
                                    ->content(function ($record) {
                                        if (!$record) return '0 ₫';
                                        
                                        // Tính từ orders thời gian thực
                                        $total = $record->orders()
                                            ->where('order_status', '!=', 'cancelled')
                                            ->sum('grand_total');
                                        
                                        return number_format($total, 0, ',', '.') . ' ₫';
                                    })
                                    ->columnSpan(1),

                                Forms\Components\Placeholder::make('total_debt_display')
                                    ->label('Tổng công nợ')
                                    ->content(function ($record) {
                                        if (!$record) return '0 ₫';
                                        
                                        // Tính từ orders thời gian thực
                                        $debt = $record->orders()
                                            ->where('order_status', '!=', 'cancelled')
                                            ->sum('debt_amount');
                                        
                                        return number_format($debt, 0, ',', '.') . ' ₫';
                                    })
                                    ->columnSpan(1),

                                Forms\Components\Placeholder::make('orders_count_display')
                                    ->label('Tổng số đơn hàng')
                                    ->content(function ($record) {
                                        if (!$record) return '0 đơn';
                                        
                                        $count = $record->orders()
                                            ->where('order_status', '!=', 'cancelled')
                                            ->count();
                                        
                                        return $count . ' đơn';
                                    })
                                    ->columnSpan(1),

                                Forms\Components\Placeholder::make('last_order_display')
                                    ->label('Đơn hàng gần nhất')
                                    ->content(function ($record) {
                                        if (!$record) return 'Chưa có';
                                        
                                        $lastOrder = $record->orders()
                                            ->latest('order_date')
                                            ->first();
                                        
                                        if (!$lastOrder) return 'Chưa có';
                                        
                                        return $lastOrder->code . ' - ' . $lastOrder->order_date->format('d/m/Y');
                                    })
                                    ->columnSpan(1),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->visible(fn ($record) => $record !== null), // Chỉ hiện khi edit/view


                

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã KH')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Tên khách hàng')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Số điện thoại')
                    ->searchable()
                    ->icon('heroicon-m-phone')
                    ->copyable(),

                Tables\Columns\TextColumn::make('customerType.name')
                    ->label('Loại KH')
                    ->badge()
                    ->sortable()
                    ->color(fn ($record) => match($record->customerType?->name) {
                        'VIP' => 'warning',
                        'Thân thiết' => 'success',
                        'Doanh nghiệp' => 'info',
                        default => 'gray',
                    })
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_walk_in')
                    ->label('Vãng lai')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('info')
                    ->falseColor('gray')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Tables\Columns\TextColumn::make('total_purchased')
                //     ->label('Đã mua')
                //     ->money('VND')
                //     ->sortable()
                //     ->color('success')
                //     ->toggleable(),

                // Tables\Columns\TextColumn::make('total_debt')
                //     ->label('Công nợ')
                //     ->money('VND')
                //     ->sortable()
                //     ->color(fn ($state) => $state > 0 ? 'danger' : 'gray')
                //     ->toggleable(),


                Tables\Columns\TextColumn::make('total_purchased')
                    ->label('Đã mua')
                    ->money('VND', locale: 'vi')
                    ->sortable()
                    ->color('success')
                    ->getStateUsing(function ($record) {
                        // Tính từ orders thời gian thực
                        return $record->orders()
                            ->where('order_status', '!=', 'cancelled')
                            ->sum('grand_total');
                    })
                    ->toggleable(),

                Tables\Columns\TextColumn::make('total_debt')
                    ->label('Công nợ')
                    ->money('VND', locale: 'vi')
                    ->sortable()
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'gray')
                    ->getStateUsing(function ($record) {
                        // Tính từ orders thời gian thực
                        return $record->orders()
                            ->where('order_status', '!=', 'cancelled')
                            ->sum('debt_amount');
                    })
                    ->toggleable(),


                Tables\Columns\IconColumn::make('is_active')
                    ->label('Trạng thái')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('customer_type_id')
                    ->label('Loại khách hàng')
                    ->relationship('customerType', 'name')
                    ->multiple()
                    ->preload(),

                Tables\Filters\TernaryFilter::make('is_walk_in')
                    ->label('Khách vãng lai')
                    ->placeholder('Tất cả')
                    ->trueLabel('Khách vãng lai')
                    ->falseLabel('Khách thường'),

                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Trạng thái')
                    ->options([
                        '1' => 'Đang hoạt động',
                        '0' => 'Ngừng hoạt động',
                    ]),

                Tables\Filters\Filter::make('has_debt')
                    ->label('Có công nợ')
                    ->query(fn ($query) => $query->where('total_debt', '>', 0)),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label('Xem'),
                    Tables\Actions\EditAction::make()
                        ->label('Sửa'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Xóa'),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa đã chọn'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->emptyStateHeading('Chưa có khách hàng nào')
            ->emptyStateDescription('Bắt đầu bằng cách tạo khách hàng đầu tiên.')
            ->emptyStateIcon('heroicon-o-user-group');
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\CustomerResource\RelationManagers\OrdersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
            'view' => Pages\ViewCustomer::route('/{record}'),
        ];
    }
}