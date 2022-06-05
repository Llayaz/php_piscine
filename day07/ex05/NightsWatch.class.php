<?php 

class NightsWatch
{
	private $_nw;

	public function recruit($new_recruit)
	{
		$this->_nw[] = $new_recruit;
	}
	public function fight()
	{
		foreach ($this->_nw as $person)
			if ($person instanceof IFighter)
				$person->fight();
	}
}

 ?>