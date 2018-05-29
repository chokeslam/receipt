<?php

namespace App\Appclass;

use App\Appclass\Calculation;

Class PerformanceClassify{

	protected $Target;
	protected $Calculation;

	function __construct($Target){

		$this->Target = $Target->toArray();
		$this->Calculation = new Calculation;

	}

	public function Classify(Array $Condition)
	{
		
		$ResArray = $this->Target;

		foreach ($Condition as $key => $value) {

			foreach ($ResArray as $rows => $val) {

				if ($val[$key] != $value){

					 unset($ResArray[$rows]);
				}
			}
		}

		return $ResArray;
	}
	public function ClassifyForViews(){

        $Condition = array();
    	$Calculation = $this->Calculation;
    	
        for ($Place=1; $Place <3 ; $Place++) { 
            for ($Status=1; $Status <3 ; $Status++) { 
                for ($Class=1; $Class <4 ; $Class++) { 
                    if ($Place==1) {
                        $a = array('Class'=>$Class,'Status'=>$Status,'Place'=>'B');
                        array_push($Condition, $a);
                    }else{
                        $a = array('Class'=>$Class,'Status'=>$Status,'Place'=>'C');
                        array_push($Condition, $a);
                    }
                }

            }
        }
        
        $result = array();
        foreach ($Condition as $key => $value) {

        	$Target = $this->Classify($value);
        	array_push($result,$Calculation->show($Target));
        }
        return $result;
	}
    public function Restructuring( Array $Target)
    {
        $result = Array();

        foreach ($Target as $value) {           
            foreach ($value as $key => $value) {

                $result[]=$value;
            }
        }
        
        return $result;
    }
}