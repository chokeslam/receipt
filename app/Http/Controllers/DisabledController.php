<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receipt;
use App\sales;

class DisabledController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function disabled()
    {   
        $ViewData = Receipt::select('Name', 'User','Numbers','Transactor','status','Start_time','PayBack_time')
        
        ->where('End_time', '!=', Null)
        ->get()
        ->sort();

        $query = Receipt::select('Name','User','End_time')
        ->distinct()
        ->where('End_time', '!=', Null)
        ->get();

        foreach ($ViewData as $val) {
            
            $val->Numbers =str_pad($val->Numbers,6,"0",STR_PAD_LEFT);
        }
        return view('disabled', compact('query' ,'ViewData'));
    }
    
}
