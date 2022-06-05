<?php 
//override of redefinition of method -> if same method exists in parent and child class, child class uses its own
class Targaryen {

	public function getBurned()
	{
		if ($this->resistsFire() == TRUE)
			return "emerges naked but unharmed";
		return "burns alive";
	}

//parent resistFire function that sets it to false if the child has no resistsfire function
	public function resistsFire()
	{
		return FALSE;
	}
}

 ?>