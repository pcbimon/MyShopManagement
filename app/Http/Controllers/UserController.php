<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login(){
        return view('login');
    }
    public function Authen(Request $request){
        return 'authen';
    }
    public function Logout()
    {
        return 'logout';
    }
    public function CheckAuthen()
    {
        return 'Check is Authen';
    }
}
