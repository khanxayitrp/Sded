<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function Home()
    {
    	return view('dashboard');
    }

    public function Register()
    {
    	return view('register');
    }

    public function Login()
    {
    	return view('login');
    }
    
    //
}
