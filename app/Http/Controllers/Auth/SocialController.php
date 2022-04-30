<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Social;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function index(string $network)
    {
        return Socialite::driver($network)->redirect();
    }

    public function callback(string $network, Social $social)
    {
        return redirect($social->authUser(Socialite::driver($network)->user()));
    }
}
