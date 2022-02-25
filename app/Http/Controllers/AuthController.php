<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return Socialite::driver('laravelpassport')->redirect();
    }

    public function callback()
    {
        $passportUser = Socialite::driver('laravelpassport')->user();

        $user = User::where('id', $passportUser->id)
            ->firstOr(function () use ($passportUser) {
                return User::create([
                    'id' => $passportUser->id,
                    'email' => $passportUser->email,
                    'email_verified_at' => now(),
                    'name' => $passportUser->name,
                    'password' => bcrypt(Str::random(200)),
                    'remember_token' => Str::random(100),
                ]);
            });

        Auth::login($user);

        return redirect()->route('welcome');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('welcome');
    }
}
