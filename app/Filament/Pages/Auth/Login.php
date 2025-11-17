<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class Login extends BaseLogin
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        // Nút đăng nhập Google
                        Placeholder::make('google_login')
                            ->label('')
                            ->content(new HtmlString($this->getGoogleLoginButton())),
                        
                        // Placeholder::make('divider')
                        //     ->label('')
                        //     ->content(new HtmlString('<div class="relative my-6"><div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-300 dark:border-gray-600"></div></div><div class="relative flex justify-center text-sm"><span class="px-2 bg-white dark:bg-gray-900 text-gray-500">Hoặc đăng nhập với email</span></div></div>')),
                        
                        
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),

                        // if(env('DEMO_USER')) {
                            
                        // }
                        
                        // Thêm phần hiển thị tài khoản demo
                        Placeholder::make('demo_accounts')
                            ->label('Tài khoản đã tắt quyền xóa - để tránh spam')
                            ->hidden(!env('DEMO_USER'))
                            ->content(new HtmlString($this->getDemoAccountsHtml())),

                        Placeholder::make('user_guide')
                            ->label('')
                            // ->hidden(!env('DEMO_USER'))
                            ->content(new HtmlString('<div class="mt-3 text-center"><a href="/huong-dan" target="_blank" rel="noopener noreferrer" class="text-sm text-primary-600 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-300 font-medium inline-flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>Xem hướng dẫn sử dụng<svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg></a></div>')),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getGoogleLoginButton(): string
    {
        $googleUrl = route('auth.google');
        
        return <<<HTML
        <a href="{$googleUrl}" 
           class="w-full inline-flex justify-center items-center gap-3 px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            <svg class="w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
            </svg>
            <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Đăng nhập với Google</span>
        </a>
        HTML;
    }

    // Thêm tài khoản demo vào footer sau nút đăng nhập
    public function getFooter(): ?\Illuminate\Contracts\Support\Htmlable
    {
        return new HtmlString('<div class="mt-6">' . $this->getDemoAccountsHtml() . '</div>');
    }

    protected function getDemoAccountsHtml(): string
    {
        $accounts = [
            [
                'label' => 'Admin',
                'email' => 'quantrivien@gmail.com',
                'password' => 'admin',
                'role' => 'Quản trị viên'
            ],
            // [
            //     'label' => 'Nhân viên',
            //     'email' => 'nhanvien@gmail.com',
            //     'password' => 'admin',
            //     'role' => 'Quản lý'
            // ],
            
        ];

        $html = '<div class="space-y-3 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">';
        
        foreach ($accounts as $account) {
            $html .= '<div class="p-3 bg-white dark:bg-gray-900 rounded border border-gray-200 dark:border-gray-600">';
            $html .= '<div class="flex justify-between items-start mb-2">';
            $html .= '<span class="text-xs font-semibold text-primary-600 dark:text-primary-400">' . $account['role'] . '</span>';
            $html .= '<button type="button" onclick="fillLoginForm(\'' . $account['email'] . '\', \'' . $account['password'] . '\')" ';
            $html .= 'class="text-xs text-primary-600 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-300 font-medium">';
            $html .= 'Sử dụng →</button>';
            $html .= '</div>';
            $html .= '<div class="text-sm space-y-1">';
            $html .= '<div class="text-gray-600 dark:text-gray-400"><span class="font-medium">Email:</span> ' . $account['email'] . '</div>';
            $html .= '<div class="text-gray-600 dark:text-gray-400"><span class="font-medium">Password:</span> ' . $account['password'] . '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        
        $html .= '</div>';
        
        // Thêm JavaScript để fill form
        $html .= <<<'JS'
        <script>
        function fillLoginForm(email, password) {
            // Tìm và điền email
            const emailInput = document.querySelector('input[type="email"]');
            if (emailInput) {
                emailInput.value = email;
                emailInput.dispatchEvent(new Event('input', { bubbles: true }));
            }
            
            // Tìm và điền password
            const passwordInput = document.querySelector('input[type="password"]');
            if (passwordInput) {
                passwordInput.value = password;
                passwordInput.dispatchEvent(new Event('input', { bubbles: true }));
            }
            
            // Scroll lên form
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        </script>
        JS;
        
        return $html;
    }
    

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Email')
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus();
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Mật khẩu')
            ->password()
            ->revealable()
            ->required();
    }
}