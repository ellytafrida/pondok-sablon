<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;


class SocialiteController extends Controller
{
    function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    function handleProviderCallback($provider)
    {

        if (Auth::check()) {
            return redirect('/')->with(['success' => 'Login Berhasil']);
        } else {
            try {
                $user = Socialite::driver($provider)->user();
            } catch (Exception $e) {
                return redirect('login')->with('error', 'Login Gagal!');
            }

            $loggedUser = $this->findOrCreateUser($user, $provider);

            Auth::login($loggedUser);

            return redirect('/')->with(['success' => 'Login Berhasil']);
        }
    }

    function findOrCreateUser($socialUser, $provider)
    {
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())->where('provider_name', $provider)->first();

        if ($socialAccount) {
            return $socialAccount->user;
        } else {
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                ]);
            }

            $user->socialAccount()->create([
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;
        }
    }
}
