<?php

namespace App\Http\Traits;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

trait OAuthDriverTrait
{
    public function handleDriverRedirect()
    {
        return Socialite::driver($this->driverType())->redirect();
    }

    public function handleDriverCallback()
    {
        try {
            $facebook_user = Socialite::driver($this->driverType())->user();
            $facebook_user_existed =  User::where([['oauth_id', $facebook_user->id], ['oauth_type', $this->driverType()]])->first();
            if ($facebook_user_existed) {
                Auth::login($facebook_user_existed);
                return redirect()->route('dashboard');
            } else {
                $newUser = User::create([
                    'name'        => $facebook_user->name,
                    'email'       => $facebook_user->email,
                    'oauth_id'    => $facebook_user->id,
                    'oauth_type'  => $this->driverType(),
                    'password'    => Hash::make($facebook_user->id)
                ]);

                Auth::login($newUser);

                return redirect()->route('dashboard');
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    abstract function driverType();
}
