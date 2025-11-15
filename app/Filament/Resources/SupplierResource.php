<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Nhà cung cấp';

    protected static ?string $modelLabel = 'Nhà cung cấp';

    protected static ?string $pluralModelLabel = 'Nhà cung cấp';

    protected static ?string $navigationGroup = 'Quản lý';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cơ bản')
                    ->schema([
                        Forms\Components\TextInput::make('code')
                            ->label('Mã NCC')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50)
                            ->placeholder('VD: NCC001')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('name')
                            ->label('Tên nhà cung cấp')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nhập tên nhà cung cấp')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('phone')
                            ->label('Số điện thoại')
                            ->tel()
                            ->maxLength(20)
                            ->placeholder('0123456789')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('email@example.com')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('contact_person')
                            ->label('Người liên hệ')
                            ->maxLength(255)
                            ->placeholder('Tên người liên hệ')
                            ->columnSpan(1),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Đang hoạt động')
                            ->default(true)
                            ->inline(false)
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Thông tin chi tiết')
                    ->schema([
                        Forms\Components\Textarea::make('address')
                            ->label('Địa chỉ')
                            ->rows(3)
                            ->placeholder('Nhập địa chỉ đầy đủ')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('notes')
                            ->label('Ghi chú')
                            ->rows(3)
                            ->placeholder('Ghi chú thêm về nhà cung cấp')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Thông tin công nợ')
                    ->schema([
                        Forms\Components\TextInput::make('total_debt')
                            ->label('Tổng công nợ (VND)')
                            ->numeric()
                            ->default(0)
                            ->suffix('₫')
                            ->placeholder('0')
                            ->helperText('Tổng công nợ hiện tại của nhà cung cấp'),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã NCC')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Đã sao chép mã NCC')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Tên nhà cung cấp')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Số điện thoại')
                    ->searchable()
                    ->icon('heroicon-m-phone')
                    ->copyable(),

                Tables\Columns\TextColumn::make('contact_person')
                    ->label('Người liên hệ')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('total_debt')
                    ->label('Công nợ')
                    ->money('VND')
                    ->sortable()
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'success'),

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

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Cập nhật')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
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
            ->emptyStateHeading('Chưa có nhà cung cấp nào')
            ->emptyStateDescription('Bắt đầu bằng cách tạo nhà cung cấp đầu tiên.')
            ->emptyStateIcon('heroicon-o-building-office');
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
            'view' => Pages\ViewSupplier::route('/{record}'),
        ];
    }
}