<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receipt;
use App\sales;
use App\Http\Requests\CheckNumbersRequest;

class RetrieveController extends Controller
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

    /*
     * DB status->   N = 未啟用 , Y = 已啟用 , F=已繳回 
    */
    public function retrieve()
    {   
        $ViewData = Receipt::select('Name', 'User','Numbers','Transactor','status','Start_time','PayBack_time')
        
        ->where('Status', '=', 'F')
        ->where('End_time', '=', Null)
        ->get()->sort();

        $query = Receipt::select('Name','User','End_time')
        ->distinct()
        ->where('Status', '=', 'F')
        ->where('End_time', '=', Null)
        ->get();
        // foreach ($a as $key => $value) {
        //     $tar = $a[$key]['Name'];
        //     foreach ($query as $key => $value) {
        //         $nnn = $query[$key]['Name'];
        //         if ($tar ==$nnn) {
        //             echo $value;
        //             echo '<br>';
        //         }
        //     }
        // }
        foreach ($ViewData as $val) {
            
            $val->Numbers =str_pad($val->Numbers,6,"0",STR_PAD_LEFT);
        }
        return view('retrieve', compact('query' ,'ViewData'));
        // $query = Receipt::select('Name','User','Numbers','End_time')
        // ->where('Status', '=', 'F')
        // ->get();

        // foreach ($query as $val) {

        //     //substr($val->Name,0,-12);
        //     $val->Numbers =substr($val->Name,0,-12). str_pad($val->Numbers,5,"0",STR_PAD_LEFT);
        //     //echo $val->Numbers;
        // }
        // return view('retrieve', compact('query'));
    }
    public function rollback(CheckNumbersRequest $Request){

    	$Name = $Request->input('Name');
        $Numbers = $Request->input('Numbers');

        foreach ($Numbers as $key => $value) {
             Receipt::where('Name', $Name)
            ->where('Numbers', $value)
            ->update(['Transactor'=>Null,'status'=>'Y','Start_time'=>Null , 'PayBack_time'=>Null]);
        }

    	return redirect('retrieve');

    }
}
