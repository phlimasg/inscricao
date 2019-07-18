<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class configController extends Controller
{
    public function __construct(){     
        $this->middleware(function ($request, $next) {  
            if(Auth::check() === false){
                return redirect('/login');
            }          
            if(Auth::user()->id_user_profile == 1){
                return $next($request);
            }
            abort(403, 'Usuário não autorizado!');
        });
    }
    
    public function index(){
        return 'config';
    }
}
