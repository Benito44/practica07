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
    /**
     * redirect
     * S'encarrega de redirigir a l'usuari a la pàgina 
     * d'inici de sessió corresponent
     * @param  mixed $provider
     * @return void
     */
    public function redirect($provider){

        return Socialite::driver($provider)->redirect();
    }
    
    /**
     * callback
     * Agafa les dades del usuari per fer l'inici de sessió.
     * Si no existeix l'inserta a la base de dades
     * Si aquest usuari inicia sessió amb un metode diferent el notifica. 
     * @param  mixed $provider
     * @return void
     */
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
