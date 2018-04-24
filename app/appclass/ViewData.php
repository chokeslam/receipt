<?php

namespace App\Appclass;

use App\Receipt;

class ViewData{

	protected $query;

	function __construct($query){

		$this->query       = $query;
	}

	protected function GetNameandUser(){

		$NameandUser = array();
		$query = $this->query;

		foreach ($query as $key => $value) {

			$NameandUser[$key]['Name'] = $value->Name;
            $NameandUser[$key]['User'] = $value->User;

		}
		return $NameandUser;
	}

	public function GetNumbers($status){

		$NameandUser =$this->GetNameandUser();

		foreach ($NameandUser as $key => $value) {

			$ViewData = array();
			$query = Receipt::select('Numbers')
			->where('Name', $value['Name'])
			->where('Status', '=', $status)
			->get();

			foreach ($query as $val) {

				$Numbers = str_pad($val->Numbers,5,"0",STR_PAD_LEFT);
				array_push($ViewData,$Numbers);

			}

			$NameandUser[$key]['Numbers'] = $ViewData;

		}
		
		return $NameandUser;
	}
}