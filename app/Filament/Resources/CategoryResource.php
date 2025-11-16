<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Danh mục sản phẩm';
    
    protected static ?string $modelLabel = 'Danh mục';
    
    protected static ?string $pluralModelLabel = 'Danh mục sản phẩm';

    protected static ?string $navigationGroup = 'Kho hàng';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin danh mục')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên danh mục')
                            ->required()
                            ->maxLength(255),


                        Forms\Components\Select::make('parent_id')
                            ->label('Danh mục cha')
                            ->relationship('parent', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Để trống nếu là danh mục gốc'),

                        Forms\Components\Textarea::make('description')
                            ->label('Mô tả')
                            ->rows(3)
                            ->maxLength(65535)
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Kích hoạt')
                            ->default(true)
                            ->inline(false),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên danh mục')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                

                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Danh mục cha')
                    ->sortable()
                    ->searchable()
                    ->placeholder('—')
                    ->badge()
                    ->color('info'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Trạng thái')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->alignCenter(),

                // Tables\Columns\TextColumn::make('children_count')
                //     ->label('Danh mục con')
                //     ->counts('children')
                //     ->badge()
                //     ->color('warning')
                //     ->alignCenter(),

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
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Trạng thái')
                    ->placeholder('Tất cả')
                    ->trueLabel('Đang hoạt động')
                    ->falseLabel('Không hoạt động'),

                Tables\Filters\Filter::make('root')
                    ->label('Danh mục gốc')
                    ->query(fn ($query) => $query->whereNull('parent_id'))
                    ->toggle(),

                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Danh mục cha')
                    ->relationship('parent', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\ActionGroup::make([
                    
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activate')
                        ->label('Kích hoạt')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(fn ($records) => $records->each->update(['is_active' => true]))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Vô hiệu hóa')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(fn ($records) => $records->each->update(['is_active' => false]))
                        ->deselectRecordsAfterCompletion(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}