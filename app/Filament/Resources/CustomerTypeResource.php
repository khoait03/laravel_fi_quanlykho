<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerTypeResource\Pages;
use App\Models\CustomerType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerTypeResource extends Resource
{
    protected static ?string $model = CustomerType::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Loại khách hàng';

    protected static ?string $modelLabel = 'Loại khách hàng';

    protected static ?string $pluralModelLabel = 'Loại khách hàng';

    protected static ?string $navigationGroup = 'Quản lý khách hàng';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin loại khách hàng')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên loại khách hàng')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('VD: VIP, Thân thiết, Thường...')
                            ->helperText('Tên loại khách hàng giúp phân loại khách hàng')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Mô tả')
                            ->rows(4)
                            ->placeholder('Nhập mô tả chi tiết về loại khách hàng này')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên loại')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->badge()
                    ->color(fn ($record) => match($record->name) {
                        'VIP' => 'warning',
                        'Thân thiết' => 'success',
                        'Thường' => 'gray',
                        default => 'primary',
                    }),

                Tables\Columns\TextColumn::make('description')
                    ->label('Mô tả')
                    ->wrap()
                    ->limit(50)
                    ->toggleable(),

                // Tables\Columns\TextColumn::make('customers_count')
                //     ->label('Số khách hàng')
                //     ->counts('customers')
                //     ->sortable()
                //     ->badge()
                //     ->color('info'),

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
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label('Xem'),
                    Tables\Actions\EditAction::make()
                        ->label('Sửa'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Xóa')
                        ->requiresConfirmation()
                        ->modalHeading('Xóa loại khách hàng')
                        ->modalDescription('Bạn có chắc chắn muốn xóa loại khách hàng này? Hành động này không thể hoàn tác.')
                        ->modalSubmitActionLabel('Xóa'),
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
            ->emptyStateHeading('Chưa có loại khách hàng nào')
            ->emptyStateDescription('Bắt đầu bằng cách tạo loại khách hàng đầu tiên.')
            ->emptyStateIcon('heroicon-o-tag');
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
            'index' => Pages\ListCustomerTypes::route('/'),
            'create' => Pages\CreateCustomerType::route('/create'),
            'edit' => Pages\EditCustomerType::route('/{record}/edit'),
            'view' => Pages\ViewCustomerType::route('/{record}'),
        ];
    }
}