<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LaravelGoogleGraph extends Controller
{
    function index()
    {
    	$data = DB::table('staff')
    			->select(
    				DB::raw('Sex as sex'),
    				DB::raw('count(*) as number'))
    			->groupBy('Sex')
    			->get();

    	$array[] = ['SEX','Number'];
    	foreach ($data as $key => $value)
    	{
    		$newSex = $value->sex;
    		if ($value->sex === 'F'){
    			$newSex = 'ຜູ້ຍິງ';
    		}else{
    			$newSex = 'ຜູ້ຊາຍ';
    		}
    		$array[++$key] = [$newSex,$value->number];

    	}

        
    	//dd(json_encode($array));
    	return view('google_pie_chart')->with('sex',json_encode($array));
    }
}
