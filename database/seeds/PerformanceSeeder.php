<?php

use Illuminate\Database\Seeder;
use App\Performance;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('performances')->truncate();

        Performance::create([
        	'Name'=>'劉俊廷',
            'Amount'=>'0.01',
        	'Class'=>'1',
        	'status'=>'1',
        	'Place'=>'B',
        	'date'=>'2018-05-15',
        ]);
        Performance::create([
        	'Name'=>'慧儒',
            'Amount'=>'2.5',
        	'Class'=>'1',
        	'status'=>'2',
        	'Place'=>'B',
        	'date'=>'2018-05-15',
        ]);
        Performance::create([
        	'Name'=>'顧嘉永',
            'Amount'=>'3',
        	'Class'=>'2',
        	'status'=>'2',
        	'Place'=>'B',
        	'date'=>'2018-05-15',
        ]);
        Performance::create([
        	'Name'=>'鄭人碩',
            'Amount'=>'0.01',
        	'Class'=>'2',
        	'status'=>'1',
        	'Place'=>'B',
        	'date'=>'2018-05-15',
        ]);
        Performance::create([
        	'Name'=>'崔志揚',
            'Amount'=>'0.01',
        	'Class'=>'3',
        	'status'=>'1',
        	'Place'=>'B',
        	'date'=>'2018-05-15',
        ]);
        Performance::create([
        	'Name'=>'張書瑋',
            'Amount'=>'4.5',
        	'Class'=>'3',
        	'status'=>'2',
        	'Place'=>'B',
        	'date'=>'2018-05-15',
        ]);         
    }
}
