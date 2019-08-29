<?php

namespace App\Http\Controllers;

use App\Mail\cadInteresseMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class emailController extends Controller
{
    public function cad_interesse()
    {
        return view('admin.cad_interesse');
    }
    public function cad_interesse_send(Request $request)
    {
        try { 
            //dd($request->nome);          
            
            Mail::to($request->email)
            ->queue(new cadInteresseMail($request));
            return redirect()->back();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
