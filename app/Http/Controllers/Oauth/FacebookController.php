<?php

namespace App\Http\Controllers\Oauth;

use App\Http\Controllers\Controller;
use App\Http\Traits\OAuthDriverTrait;

class FacebookController extends Controller
{
    use OAuthDriverTrait;

    public function driverType(): string
    {
        return 'facebook';
    }
}
