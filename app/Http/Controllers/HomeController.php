<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appclass\CreateReceiptdata;
use App\Receipt;

class HomeController extends Controller
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
    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        $query = Receipt::select('Name')->distinct()->where('status','N')->get();
        return view('admin', compact('query'));
    }

    public function create(Request $Request)
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



    }
}
