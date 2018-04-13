<?php

use Illuminate\Database\Seeder;
use App\Receipt;

class ReceiptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receipts')->truncate();

        for ($i=1; $i <=50 ; $i++) { 

        	Receipt::create([

	        	'Name'       => 'B00001~B00050',
	        	'User'       => '',
	        	'Numbers'    => $i,
	        	'Status'     => 'N',

        	]);
        }


    }
}
