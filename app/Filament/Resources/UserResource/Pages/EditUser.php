<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('changePassword')
                ->label('Đổi mật khẩu')
                ->icon('heroicon-o-key')
                ->modalSubmitActionLabel('Xác nhận')
                ->form([
                    \Filament\Forms\Components\TextInput::make('new_password')
                        ->label('Mật khẩu mới')
                        ->password()
                        ->required()
                        ->minLength(8)
                        ->same('confirm_password')
                        ->validationAttribute('mật khẩu mới'),
                    
                    \Filament\Forms\Components\TextInput::make('confirm_password')
                        ->label('Xác nhận mật khẩu')
                        ->password()
                        ->required()
                        ->dehydrated(false)
                        ->validationAttribute('xác nhận mật khẩu'),
                ])
                ->action(function (array $data) {
                    $this->record->update([
                        'password' => bcrypt($data['new_password'])
                    ]);
                    
                    \Filament\Notifications\Notification::make()
                    ->success()
                    ->title('Đổi mật khẩu thành công')
                    ->send();
            }),
        // Actions\DeleteAction::make(),
    ];
}
}