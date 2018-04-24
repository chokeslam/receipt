<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Appclass\CreateReceiptdata;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Appclass\ViewData;
use App\Receipt;
use App\sales;
use App\Http\Requests\CreateSalesRequest;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\CheckUserRequest;

class IndexController extends Controller
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
     * DB status->   N = 未啟用 , Y = 已啟用 , F=已繳回 , C= 已關閉
    */
    public function index()
    {
        $query = Receipt::select('Name', 'User')
        ->distinct()
        ->where('Status', '=', 'Y')
        ->get();

        $ViewData = new ViewData($query);
        $ViewData = $ViewData->GetNumbers('Y');

        return view('index', compact('ViewData' ,'query'));
    }

    public function retrieve()
    {
        $query = Receipt::select('Name','User','Numbers','End_time')
        ->where('Status', '=', 'F')
        ->get();

        foreach ($query as $val) {

            //substr($val->Name,0,-12);
            $val->Numbers =substr($val->Name,0,-12). str_pad($val->Numbers,5,"0",STR_PAD_LEFT);
            //echo $val->Numbers;
        }
        return view('retrieve', compact('query'));
    }

    public function admin()
    {
        $query = Receipt::select('Name')
        ->distinct()
        ->where('status','N')
        ->get();

        $sales = sales::select('Name')->get();
        return view('admin', compact('query', 'sales'));
    }

    public function create(CreateRequest $Request)
    {
         $place = $Request->input('place');
         $firstnumber = $Request->input('firstnumber');
         $lastnumber = $Request->input('lastnumber');

         //取 要存入DB 的資料
         $name = new CreateReceiptdata($place,$firstnumber,$lastnumber);
         $numberarray = $name->GetArray();
         $name = $name->Getname();
         $status = 'N';
         //存入DB
         foreach ($numberarray as $key => $value) {
            Receipt::create(['Name'=>$name,'Numbers'=>$value,'Status'=>$status]);
         }

         return redirect('admin');
    }
    public function createsales(CreateSalesRequest $Request)
    {
        sales::create(['Name'=>$Request->input('createsales')]);
        return redirect('admin');
    }

    public function checkuser(CheckUserRequest $Request)
    {
        $Name = $Request->input('receipt');
        $User  = $Request->input('sales');
        Receipt::where('Name', $Name)->update(['User'=>$User ,'status'=>'Y']);

        return redirect('index');
    }

    public function close($Name)
    {
        $date = date('Y-m-d');
        Receipt::where('Name', $Name)
        ->where('End_time', '=', Null)
        ->update(['status'=>'C', 'End_time'=>$date]);
        return redirect('index');
    }

    public function CheckNumbers(Request $Request)
    {
        $Name = $Request->input('Name');
        $Numbers = $Request->input('Numbers');
        $date = date('Y-m-d');

        // echo $Name;

        // foreach ($Numbers as $key => $value) {
        //     echo $value.'<br>';
        // }
        foreach ($Numbers as $key => $value) {
             Receipt::where('Name', $Name)
            ->where('Numbers', $value)
            ->update(['status'=>'F', 'End_time'=>$date]);
        }
        return redirect('index');
    }
}
