<?php 

class Tyrion extends Lannister
{
	public function getSize()
	{
		return "Short";
	}

	public function __construct()
	{
		parent::__construct();
		echo "My name is Tyrion" . PHP_EOL;
	}
}

 ?>