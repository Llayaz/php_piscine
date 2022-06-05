<?php 

Class Color {

	public $red;
	public $green;
	public $blue;

	public static $verbose = FALSE;

	static function doc()
	{
		echo (file_get_contents('./Color.doc.txt')) . PHP_EOL ;
	}

	public function __construct($rgb_array)
	{
//		if (array_key_exists('rgb', $rgb_array))
		if (isset($rgb_array['rgb']))
		{
			$this->red = intval($rgb_array['rgb']) & 0xFF;
			$this->green = intval($rgb_array['rgb']) >> 8 & 0xFF;
			$this->blue = intval($rgb_array['rgb']) >> 16 & 0xFF;
		}
		else
		{
			$this->red = intval($rgb_array['red']);
			$this->green = intval($rgb_array['green']);
			$this->blue = intval($rgb_array['blue']);
		}

		$this->red = $this->clamp(0, 255, $this->red);
		$this->green = $this->clamp(0, 255, $this->green);
		$this->blue = $this->clamp(0, 255, $this->blue);

		if (self::$verbose == TRUE)
			echo $this . ' constructed.' . PHP_EOL;
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
			echo $this . ' destructed.' . PHP_EOL;
	}

	public function __toString()
	{
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
	}

	public function add($color_obj)
	{
		return (new Color (array('red' => ($this->red + $color_obj->red), 'green' => ($this->green + $color_obj->green), 'blue' => ($this->blue + $color_obj->blue))));
	}

	public function sub($color_obj)
	{
		return (new Color (array('red' => ($this->red - $color_obj->red), 'green' => ($this->green - $color_obj->green), 'blue' => ($this->blue - $color_obj->blue))));
	}

	public function mult($value)
	{
		return (new Color (array('red' => ($this->red * $value), 'green' => ($this->green * $value), 'blue' => ($this->blue * $value))));
	}

	private function clamp($min, $max, $current)
	{
		return max($min, min($max, $current));
	}
}

 ?>