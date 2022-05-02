<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Exception;
use Hamcrest\Core\IsNull;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialContract;

use function PHPUnit\Framework\isNull;

class SocialService implements Social
{
    public function authUser(SocialContract $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        //dd($socialUser->getNickname());
        if ($user) {
            if (isNull($socialUser->getName())) {
                $user->name = $socialUser->getNickname();
            } else {
                $user->name = $socialUser->getName();
            }

            $user->avatar = $socialUser->getAvatar();
            if ($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account.index');
            }
            throw new Exception("Wasn't auth, we can try latter");
        } else {
            return route('register');
        }
    }
}
