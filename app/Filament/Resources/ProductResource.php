<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Filament\Components\ImageUploadComponent;
use App\Filament\Exports\ProductExport;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Sản phẩm';

    protected static ?string $modelLabel = 'Sản phẩm';

    protected static ?string $pluralModelLabel = 'Sản phẩm';

    protected static ?string $navigationGroup = 'Kho hàng';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cơ bản')
                    ->schema([
                        Forms\Components\TextInput::make('code')
                            ->label('Mã sản phẩm')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(100)
                            ->placeholder('VD: SP001')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('name')
                            ->label('Tên sản phẩm')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nhập tên sản phẩm')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => 
                                $set('slug', Str::slug($state))
                            )
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->placeholder('tu-dong-tao-slug')
                            ->helperText('URL thân thiện cho sản phẩm')
                            ->columnSpan(2),

                        Forms\Components\Select::make('category_id')
                            ->label('Danh mục')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Tên danh mục')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->label('Mô tả')
                                    ->rows(3),
                            ])
                            ->columnSpan(1),

                        Forms\Components\Select::make('variant_id')
                            ->label('Đơn vị tính')
                            ->relationship('variant', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Tên đơn vị')
                                    ->required()
                                    ->placeholder('VD: Kilogram')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('code')
                                    ->label('Mã đơn vị')
                                    ->required()
                                    ->placeholder('VD: kg')
                                    ->maxLength(20),
                            ])
                            ->helperText('Đơn vị tính mặc định')
                            ->columnSpan(1),

                        // Forms\Components\FileUpload::make('image')
                        //     ->label('Hình ảnh')
                        //     ->image()
                        //     ->imageEditor()
                        //     ->directory('products')
                        //     ->maxSize(2048)
                        //     ->helperText('Kích thước tối đa: 2MB')
                        //     ->columnSpan(2),

                        ImageUploadComponent::make(
                                        'image',
                                        'name',
                                        'product',
                                        'images/products',  
                        )
                        ->helperText('Kích thước tối đa: 2MB')
                        ->columnSpan(2),


                        Forms\Components\Toggle::make('is_active')
                            ->label('Đang bán')
                            ->default(true)
                            ->inline(false)
                            ->columnSpan(2),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Giá sản phẩm')
                    ->schema([
                        Forms\Components\TextInput::make('purchase_price')
                            ->label('Giá nhập')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->suffix('₫')
                            ->placeholder('0')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('retail_price')
                            ->label('Giá bán lẻ')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->suffix('₫')
                            ->placeholder('0')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('collaborator_price')
                            ->label('Giá cộng tác viên')
                            ->numeric()
                            ->default(0)
                            ->suffix('₫')
                            ->placeholder('0')
                            ->helperText('Giá cho cộng tác viên/đại lý')
                            ->columnSpan(1),

                        Forms\Components\Placeholder::make('profit_margin')
                            ->label('Lợi nhuận')
                            ->content(function ($get) {
                                $purchase = $get('purchase_price') ?? 0;
                                $retail = $get('retail_price') ?? 0;
                                if ($purchase > 0) {
                                    $margin = (($retail - $purchase) / $purchase) * 100;
                                    return number_format($margin, 2) . '%';
                                }
                                return '0%';
                            })
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Tồn kho')
                    ->schema([
                        Forms\Components\TextInput::make('stock_quantity')
                            ->label('Số lượng tồn kho')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->placeholder('0')
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('min_stock_alert')
                            ->label('Cảnh báo tồn tối thiểu')
                            ->numeric()
                            ->default(0)
                            ->placeholder('0')
                            ->helperText('Cảnh báo khi tồn kho thấp hơn số này')
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Mô tả chi tiết')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Mô tả')
                            ->rows(5)
                            ->placeholder('Nhập mô tả chi tiết về sản phẩm')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Ảnh')
                    ->circular()
                    ->getStateUsing(fn($record) => ImageUploadComponent::getStorageImageUrl($record->image, 'default/no-image.png'))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('code')
                    ->label('Mã SP')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Danh mục')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('variant.name')
                    ->label('ĐVT')
                    ->badge()
                    ->color('gray')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('purchase_price')
                    ->label('Giá nhập')
                    ->money('VND')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('retail_price')
                    ->label('Giá bán')
                    ->money('VND')
                    ->sortable()
                    ->weight('bold')
                    ->color('success'),

                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label('Tồn kho')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color(fn ($record) => 
                        $record->stock_quantity == 0 ? 'danger' : 
                        ($record->stock_quantity <= $record->min_stock_alert ? 'warning' : 'success')
                    ),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Đang bán')
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
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Danh mục')
                    ->relationship('category', 'name')
                    ->multiple()
                    ->preload(),

                Tables\Filters\SelectFilter::make('variant_id')
                    ->label('Đơn vị tính')
                    ->relationship('variant', 'name')
                    ->multiple()
                    ->preload(),

                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Trạng thái')
                    ->options([
                        '1' => 'Đang bán',
                        '0' => 'Ngừng bán',
                    ]),

                Tables\Filters\Filter::make('low_stock')
                    ->label('Sắp hết hàng')
                    ->query(fn ($query) => $query->whereColumn('stock_quantity', '<=', 'min_stock_alert')),

                Tables\Filters\Filter::make('out_of_stock')
                    ->label('Hết hàng')
                    ->query(fn ($query) => $query->where('stock_quantity', 0)),
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

                    Tables\Actions\ExportBulkAction::make()
                        ->label('Xuất Excel đã chọn')
                        ->icon('heroicon-o-arrow-up-tray')
                        ->exporter(ProductExport::class)
                        ->color('info')
                        ->fileName(fn (): string => 'products-selected-' . date('Y-m-d-His')),

                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa đã chọn'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->emptyStateHeading('Chưa có sản phẩm nào')
            ->emptyStateDescription('Bắt đầu bằng cách tạo sản phẩm đầu tiên.')
            ->emptyStateIcon('heroicon-o-cube');
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
            'view' => Pages\ViewProduct::route('/{record}'),
        ];
    }
}