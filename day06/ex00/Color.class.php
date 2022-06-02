<?php 

Class Color {

	public $red;
	public $green;
	public $blue;

	public static $verbose = FALSE;

	static function doc()
	{
		echo (file_get_contents('/Color.doc.txt')) . PHP_EOL ;
	}

	public function __construct($rgb_array)
	{
//		if (array_key_exists('rgb', $rgb_array))
		if (isset($rgb_array['rgb']))
		{
			$this->red = intval($rgb_array['rgb']) & 0xFF;
			$this->green = intval($rgb_array['rgb']) << 8 & OxFF;
			$this->blue = intval($rgb_array['rgb']) << 16 & OxFF;
		}
		else
		{
			$this->red = intval($rgb_array['red']);
			$this->green = intval($rgb_array['green']);
			$this->blue = intval($rgb_array['blue']);
		}

		clamp($this->red);
		clamp($this->green);
		clamp($this->blue);

		if ($verbose == TRUE)
			return (sprintf("Color( red: %3d, green: %3d, blue: %3d ) constructed.", $this->red, $this->green, $this->blue));
	}

	public function __destruct()
	{
		if ($verbose == TRUE)
			return (sprintf("Color( red: %3d, green: %3d, blue: %3d ) destructed.", $this->red, $this->green, $this->blue));
	}

	public function __toString()
	{
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
	}

	public function add($color_obj)
	{
		return (new Color (array('red' => ($this->red + $color_obj->red), 'green' => ($this->green + $color_obj->green), 'blue' => ($this->blue + $color_obj->blue))));
	}

	public function sub()
	{
		return (new Color (array('red' => ($this->red - $color_obj->red), 'green' => ($this->green - $color_obj->green), 'blue' => ($this->blue - $color_obj->blue))));
	}

	private function clamp($min, $max, $current)
	{
		return max($min, min($max, $current));
	}
}

 ?>