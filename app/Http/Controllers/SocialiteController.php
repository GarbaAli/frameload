<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function  callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);

        auth()->login($user);

        return redirect()->to('/home');
    }

    public function createUser($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();

        if(!$user)
        {   
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider'=> $provider,
                'provider_id' => $getInfo->id,
                'password' => Hash::make($getInfo->name)
            ]);
        }
        
        return redirect()->to('/home');
    }
}
