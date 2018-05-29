<?php

namespace App\Appclass;

Class Condition{


	protected $ConditionArray =Array();

	public function DateRange(Array $Date)
	{
		$Start = $Date['Start'];
		$End = $Date['End'];

		for ($i=$Start; $i <=$End ; $i++) { 
			
			$Date = array('Date'=>$i);

			array_push($this->ConditionArray,$Date);

		}

		return $this->ConditionArray;
	}
	public function AllClass()
	{	
		$AllClass=Array();
		for ($i=1; $i <=3 ; $i++) {

			$Class = Array('Class'=>$i);
			array_push($AllClass,$Class);
		}
		return $AllClass;
	}
	public function AllStatus()
	{
		$AllStatus=Array();
		for ($i=1; $i <=2 ; $i++) {

			$Status = Array('Status'=>$i);
			array_push($AllStatus,$Status);
		}
		return $AllStatus;
	}

	public function merge()
	{
		$AllClass =$this->AllClass();
		$AllStatus = $this->AllStatus();
		$AllDate = $this->ConditionArray;
		$MergeArray = Array();
		
		foreach ($AllDate as $Datekey => $value) {
			$Date = $AllDate[$Datekey];
		
		foreach ($AllStatus as $Statuskey => $value) {

			$Status = $AllStatus[$Statuskey];

			foreach ($AllClass as $Classkey => $value) {
				$Class = $AllClass[$Classkey];
				
				 $Merge =array_merge($Date,$Status,$Class);
				array_push($MergeArray,$Merge);
			}
		}
		}
		return $MergeArray;
	}
	public function Targetmerge($Place,$Name){

		$merge = $this->merge();

		if (!empty($Place)) {

			foreach ($merge as $key => $value) {
				$merge[$key]['Place'] = $Place;
			}
		}
		if (!empty($Name)) {

			foreach ($merge as $key => $value) {
				$merge[$key]['Name'] = $Name;
			}
		}

		return $merge;
	}
}