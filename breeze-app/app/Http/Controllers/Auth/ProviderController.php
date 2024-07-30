<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $ProviderUser = Socialite::driver($provider)->user();

            // İlk olarak e-posta ile kullanıcıyı kontrol edin
            $user = User::where('email', $ProviderUser->getEmail())->first();

            // Eğer kullanıcı yoksa username ile kontrol edin
            if (!$user) {
                $user = User::where('username', $ProviderUser->getNickname())->first();
            }

            // Kullanıcı yoksa yeni bir kullanıcı oluşturun
            if (!$user) {
                $userData = [
                    'provider_id' => $ProviderUser->id,
                    'provider' => $provider,
                    'email' => $ProviderUser->email,
                    'provider_token' => $ProviderUser->token,
                ];

                if ($ProviderUser->name) {
                    $userData['username'] = User::generateUserName($ProviderUser->name);
                } else {
                    $userData['username'] = User::generateUserName($ProviderUser->nickname);
                }

                $user = User::create($userData);
            } else {
                // Kullanıcı varsa, sağlayıcı bilgilerini güncelleyin
                $user->update([
                    'provider_id' => $ProviderUser->id,
                    'provider' => $provider,
                    'provider_token' => $ProviderUser->token,
                ]);
            }

            // Kullanıcıyı giriş yaptırın
            Auth::login($user);
            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
