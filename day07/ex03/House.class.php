<?php 
// abstract class has abstract methods that require the child function to fill out the tasks
//abstract methods are declared but not implemented in the parent class
abstract class House
{
	abstract function getHouseName();
	abstract function getHouseSeat();
	abstract function getHouseMotto();

	public function introduce()
	{
		echo ("House " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : \"" . $this->getHouseMotto() . "\"\n");
	}
}

 ?>