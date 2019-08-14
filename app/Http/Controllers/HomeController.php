<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\staff;
use App\sdlist;
use App\positionlevel;
use App\youth;
use App\laoworker;
use App\women;
use App\payment;
use App\laomember;
use App\slideshow;
use DB;
class HomeController extends Controller
{

    public function Home()
    {

        $data = staff::select('staff.SDEDName as fname','staff.LastName as lname',
            'positionlevel.PositionName as Position','sdlist.SDlistName as location','staff.RegDate as memberdate')
                ->leftJoin('positionlevel', 'staff.PositionID', '=', 'positionlevel.PositionID')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        $data1 = laomember::all()->count();
        $data2 = youth::all()->count();
        $data3 = women::all()->count();
        $data4 = laoworker::all()->count();

        $data5 = DB::table('payment')
                ->select('staff.SDEDName as fname','staff.LastName as lname',
                        'sdlist.SDlistName as location','payment.YearPayment as Paydate','payment.Total as total','payment.DetailPayment as PayDetail',
                DB::raw('(CASE WHEN (payment.PayType ="1") THEN "ຈ່າຍຄ່າຊາວໜຸ່ມ"
                            WHEN (payment.PayType ="2") THEN "ຈ່າຍຄ່າແມ່ຍິງ"                    
                            ELSE "ຈ່າຍຄ່າກຳມະບານ" END) as Paytype'))
                ->leftJoin('staff', 'staff.IDSDED', '=', 'payment.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        $data6 = DB::table('payment')->sum('Total');
        $slide = slideshow::all();
            //dd($data6);
        return view('dashboard',compact('data','data1','data2','data3','data4','data5','data6','slide'));
    	//return view('dashboard');
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
