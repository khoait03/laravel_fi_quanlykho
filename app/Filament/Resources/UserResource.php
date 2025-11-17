<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Rmsramos\Activitylog\Actions\ActivityLogTimelineTableAction;
use Rmsramos\Activitylog\RelationManagers\ActivitylogRelationManager;
use App\Filament\Components\ImageUploadComponent;
use Illuminate\Support\Facades\Storage;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'users';

    protected static ?string $navigationLabel = 'Tài khoản';

    protected static ?string $modelLabel = 'Tài khoản';

    protected static ?string $navigationGroup = 'Quản lý tài khoản';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 5;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

   public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Grid::make(3)
                    ->schema([
                        Grid::make(1)
                            ->schema([

                                Section::make('Thông tin tài khoản')
                                    ->schema([
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->label('Họ tên'),

                                        TextInput::make('email')
                                            ->required()
                                            ->email()
                                            ->maxLength(255)
                                            ->label('Email'),

                                        TextInput::make('phone')
                                            ->required()
                                            ->maxLength(20)
                                            ->label('Số điện thoại'),


                                        TextInput::make('password')
                                            ->label('Mật khẩu')
                                            ->password()
                                            ->maxLength(255)
                                            ->dehydrated(fn($state) => filled($state))
                                            ->required(fn(Page $livewire) => ($livewire instanceof Pages\CreateUser)),

                                         Forms\Components\Select::make('roles')->label('Vai trò')
                                             ->relationship('roles', 'name')
                                             ->multiple()
                                             ->preload()
                                             ->searchable(),
                                    ]),


                            ])->columnSpan(2),

                        Grid::make(1)
                            ->schema([

                                Section::make('Avatar')
                                    ->schema([
                                        ImageUploadComponent::make(
                                            'avatar_url',
                                            'name',
                                            'Avatar',
                                            'images/users/avatar',
                                        )


                                    ]),

                                Section::make('Trạng thái')
                                    ->schema([
                                        Toggle::make('active_status')
                                            ->label('Kích hoạt'),
                                    ]),

                            ])->columnSpan(1),

                    ]),
            ]);
    }

     function getStorageImageUrl ($path, $default)
    {
        // Kiểm tra nếu $path là URL
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        // Kiểm tra ảnh trong thư mục storage
        if ($path && Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path);
        }

        // Trả về ảnh mặc định
        return asset($default);
    }
    
    public static function table(Table $table): Table
    {
        return $table
//            ->modifyQueryUsing(function (Builder $query) {
//                    $query->where('role', 'admin');
//            })
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),


                ImageColumn::make('avatar_url')
                    ->grow(false)
                    ->circular()
                    ->getStateUsing(fn($record) => ImageUploadComponent::getStorageImageUrl($record->avatar_url, 'default/user.png'))
                    ->label('Avatar'),

                Tables\Columns\TextColumn::make('name')->label('Họ tên'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('phone')->label('Điện thoại'),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Vai trò')
                    ->badge(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                
                Tables\Actions\ActionGroup::make([

                    Tables\Actions\EditAction::make(),
                    // Tables\Actions\DeleteAction::make(),


                    // Tables\Actions\Action::make('changePassword')
                    //     ->label('Đổi mật khẩu')
                    //     ->icon('heroicon-o-key')
                    //     ->modalSubmitActionLabel('Xác nhận')
                    //     ->form([
                    //         TextInput::make('new_password')
                    //             ->label('Mật khẩu mới')
                    //             ->password()
                    //             ->required()
                    //             ->minLength(8)
                    //             ->same('confirm_password')
                    //             ->validationAttribute('mật khẩu mới'),
                            
                    //         TextInput::make('confirm_password')
                    //             ->label('Xác nhận mật khẩu')
                    //             ->password()
                    //             ->required()
                    //             ->dehydrated(false)
                    //             ->validationAttribute('xác nhận mật khẩu'),
                    //     ])
                    //     ->action(function (User $record, array $data) {
                    //         $record->update([
                    //             'password' => bcrypt($data['new_password'])
                    //         ]);
                            
                    //         \Filament\Notifications\Notification::make()
                    //             ->success()
                    //             ->title('Đổi mật khẩu thành công')
                    //             ->send();
                    //     }),

                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}