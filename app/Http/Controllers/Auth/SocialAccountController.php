<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\SocialAccountService;

class SocialAccountController extends Controller
{
    public function redirectToProvider()
    {
        return \Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback(SocialAccountService $accountService)
    {
        try {
            $user = \Socialite::with('github')->user();
        } catch (\Exception $e) {
            return redirect(route('login'));
        }

        $authUser = $accountService->findOrCreate($user, 'github');

        auth()->login($authUser, true);

        return redirect(route('home'));
    }

    public function logout()
    {
        \Auth::logout();

        return redirect(route('login'));
    }
}
