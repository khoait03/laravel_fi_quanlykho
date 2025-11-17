<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleAuthController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Tìm user theo Google ID hoặc email
            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            if ($user) {
                // Cập nhật Google ID nếu chưa có
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                        'avatar_url' => $googleUser->getAvatar(),
                    ]);
                }
            } else {
                // Tạo user mới
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar_url' => $googleUser->getAvatar(),
                    'password' => Hash::make(Str::random(16)), // Random password
                    'email_verified_at' => now(),
                ]);
            }

            // Đăng nhập user
            Auth::login($user, true);

            // Redirect về Filament admin panel
            return redirect()->intended('/admin');

        } catch (Exception $e) {
            return redirect('/admin/login')
                ->with('error', 'Có lỗi xảy ra khi đăng nhập với Google: ' . $e->getMessage());
        }
    }
}