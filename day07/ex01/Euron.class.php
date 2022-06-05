<?php 

require_once 'Greyjoy.class.php';

class Euron extends Greyjoy
{
	public function announceMotto()
	{
		echo $this->familyMotto . PHP_EOL;
	}
}

 ?>