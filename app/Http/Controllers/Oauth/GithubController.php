<?php

namespace App\Http\Controllers\Oauth;

use App\Http\Controllers\Controller;
use App\Http\Traits\OAuthDriverTrait;

class GithubController extends Controller
{
    use OAuthDriverTrait;

    public function driverType(): string
    {
        return 'github';
    }
}
