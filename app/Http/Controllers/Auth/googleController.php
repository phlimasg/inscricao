<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class googleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();        
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $q = User::where('email',$user->email)->first(); 
        if($q){            
            Auth::loginUsingId($q->id);            
            return redirect('/home');
        }
        abort(403,'Acesso Negado');
        // $user->token;
    }
    public function logoff()
    {
        Auth::logout();
        return redirect('/home');
    }
}
