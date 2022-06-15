<?php 
class UnholyFactory
	{
		private $_absorbed = array();

		public function absorb ($input)
		{
			if ($input instanceof Fighter)
			{
				if (!array_key_exists($input->unit, $this->_absorbed))
				{
					$this->_absorbed[$input->unit] = $input;
					echo "(Factory absorbed a fighter of type " . $input->unit . ")" . PHP_EOL;
				} else {
					echo "(Factory already absorbed a fighter of type " . $input->unit . ")" . PHP_EOL;
				}
					

			} else {
				echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
			}
		}

		public function fabricate ()
		{

		}
	}

 ?>
