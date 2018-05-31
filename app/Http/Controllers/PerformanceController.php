<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Performance;
use App\Appclass\Calculation;
use App\Appclass\PerformanceClassify;
use App\Appclass\Condition;
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

    public function Delete($id){

        Performance::where('id', $id)
        ->delete();
        return redirect()->back();
    }

    public function Table()
    {   

        $Request = session()->get('_old_input');
        $Date = array('Start'=>$Request['Start'],'End'=>$Request['End']);
        $Date = array_filter($Date);

        $sales = sales::select('Name')->get();
        // $Target = array('Place'=>$Request['Place'],'Name'=>$Request['Name']);
        $Place = $Request['Place'];
        $Name = $Request['Name'];

        // print_r($Request);

        if (!$Date) {
            $result=null;
            return view('Performance_Table',compact('result','sales'));
        }

        if (empty($Date['Start'])) {
            $Date['Start'] =Performance::min('Date');
            $Date=array_reverse($Date);
        }
        if (empty($Date['End'])) {
            $Date['End'] =Performance::max('Date');

        }

        $query = Performance::select()
        ->wherebetween('date',$Date)
        ->get();

        $condition = new Condition;
        $Classify = new PerformanceClassify($query);
        $Calculation = new Calculation;
        $AllDate = $condition->DateRange($Date);
        // $condition = $condition->merge();
        $condition = $condition->Targetmerge($Place,$Name);


        // print_r($condition);

        $PersonAndAmount = array();
        foreach ($condition as $key => $value) {

            $Target = $Classify->Classify($value);
            array_push($PersonAndAmount,$Calculation->show($Target));
        }

        $result = $Classify->Restructuring($PersonAndAmount);
        $AllDate = $Classify->Restructuring($AllDate);
        $result = array_chunk($result,12);


        foreach ($result as $key => $value) {
            
            array_unshift($result[$key],$AllDate[$key]);
        }

        return view('Performance_Table',compact('result','sales'));
        
    }

    public function Search(Request $Request)
    {   

        return redirect()->back()                      
                         ->withInput($Request->flash());
                          
    }
}
