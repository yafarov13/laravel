<?php

namespace App\Contracts;

use Laravel\Socialite\Contracts\User as SocialContract;

interface Social
{
    public function authUser(SocialContract $socialUser):string;
}
