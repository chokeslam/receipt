<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Performance;
use App\Appclass\Calculation;
use App\Appclass\PerformanceClassify;
use App\sales;
use App\Http\Requests\PerformanceRequest;

class PerformanceController extends Controller
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
	public function Worksheet()
    {   
    	$date = date('Y-m-d');

    	$query = Performance::select()
    	->where('date',$date)
    	->get();
        
        $Calculation = new Calculation;
        $AllCalculation = $Calculation->show($query->toArray());

        $Classify =new PerformanceClassify($query);
        $ClassifyCalculation =$Classify->ClassifyForViews();

        $sales = sales::select('Name')->get();
    	return view('Performance',compact(
                                            'query',
                                            'sales',
                                            'AllCalculation',
                                            'ClassifyCalculation'
                                        ));
    }
    public function Create(PerformanceRequest $Request)
    {	
    	$date = date('Y-m-d');

    	Performance::create([
    		'Name'=>$Request->input('Name'),
    		'Amount'=>$Request->input('Amount'),
    		'Class'=>$Request->input('Class'),
    		'Status'=>$Request->input('Status'),
    		'Place'=>$Request->input('Place'),
    		'Date'=>$date
    	]);
        return response()->json('成功');
    }
}
