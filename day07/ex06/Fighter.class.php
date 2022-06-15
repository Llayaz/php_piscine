<?php 
abstract class Fighter {
	
	public $unit;

	public function __construct ($unit)
	{
		$this->unit = $unit;
	}
	
	abstract public function fight ($target);

 ?>
