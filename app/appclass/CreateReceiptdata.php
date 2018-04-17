<?php

namespace App\Appclass;

class CreateReceiptdata{
	
	protected $place;
	protected $firstnumber;
	protected $lastnumber;


	function __construct($place,$firstnumber,$lastnumber){

		$this->place       = $place;
		$this->firstnumber = $firstnumber;
		$this->lastnumber  = $lastnumber;

	}

	public function GetName(){

		$name = $this->place.$this->firstnumber.'~'.$this->place.$this->lastnumber;
		return $name;

	}

	public function GetArray(){

		$numberarray = array();
		$firstnumber = $this->firstnumber;
		$lastnumber  = $this->lastnumber;

		for ($i=$firstnumber; $i <= $lastnumber ; $i++) { 

			$number = str_pad($i,5,"0",STR_PAD_LEFT);
			array_push($numberarray,$number);
		}
		return $numberarray;
	}

}
