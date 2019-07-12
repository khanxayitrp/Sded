<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebadminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
       	$this->middleware('auth');
    	$this->middleware('multipleuser:super_admin,admin,writer');
    }

    function Listdata()
    {
    	return view('alldata');
    }
}
