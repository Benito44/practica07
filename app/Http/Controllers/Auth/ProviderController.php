<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider){

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        try {

            $SocialUser = Socialite::driver($provider)->user();
            if(User::where('email',$SocialUser->getEmail())->exists()){
                return redirect('/login')->withErrors(['email' => 'El compte de correu utilitza un mètode diferent']);
            }
            $user = User::where([
                'provider' => $provider,
                'provider_id'=> $SocialUser->id
            ])->first();


        } catch (\Exception $e) {
            return redirect('/login');
        }

       $SocialUser = Socialite::driver($provider)->user();
       $user = User::updateOrCreate([
        'provider_id' => $SocialUser->id,
        'provider' => $provider
    ], [
        'name' => $SocialUser->name,
        'username' => $SocialUser->nickname,
        'email' => $SocialUser->email,
        'provider_token' => $SocialUser->token,
    ]);
 
    Auth::login($user);
    return redirect('/dashboard');


    }
}
