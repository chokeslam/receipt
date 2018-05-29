<?php 

namespace App\Appclass;

Class Calculation{


	protected $Target;

	public function show(Array $Target){

		$this->Target = $Target;
		$show = array(
						'Person'=>$this->PersonCalculation(),
						'Amount'=>$this->AmountCalculation()
					);
		return $show;
	}

	protected function PersonCalculation(){

		$count =  count($this->Target);

		return  $count;
	}

	protected function AmountCalculation(){

		$total = null;

		foreach ($this->Target as $value) {

		 	$total = $total + $value['Amount'];
		}

		return $total;
	}


}