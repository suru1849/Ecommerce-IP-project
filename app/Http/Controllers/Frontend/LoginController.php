<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function signIn()
    {
        return view('frontend2/signin');
    }
    public function signUp()
    {
        return view('frontend2/signup');
    }
}
