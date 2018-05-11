<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receipt;
use App\sales;

class DisabledController extends Controller
{
	public function disabled()
    {   
        $ViewData = Receipt::select('Name', 'User','Numbers','status','Start_time','PayBack_time')
        
        ->where('End_time', '!=', Null)
        
        ->get();

        $query = Receipt::select('Name','User','End_time')
        ->distinct()
        ->where('End_time', '!=', Null)
        ->get();

        foreach ($ViewData as $val) {
            
            $val->Numbers =str_pad($val->Numbers,5,"0",STR_PAD_LEFT);
        }
        return view('disabled', compact('query' ,'ViewData'));
    }
    
}
