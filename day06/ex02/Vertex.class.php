<?php 

require_once "Color.class.php";

Class Vertex {

	public static $verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;

	static function doc()
	{
		echo (file_get_contents('./Vertex.doc.txt')) . PHP_EOL ;
	}

	public function __construct(array $vertex_array)
	{
		if(isset($vertex_array['x']) && isset($vertex_array['y']) && isset($vertex_array['z']))
		{
			$this->_x = $vertex_array['x'];
			$this->_y = $vertex_array['y'];
			$this->_z = $vertex_array['z'];
		}
		if (isset($vertex_array['w']))
			$this->_w = $vertex_array['w'];
		if (isset($vertex_array['color']))
			$this->color = $vertex_array['color'];
		else
			$this->color = new Color( array('red' => 255, 'green' => 255, 'blue' => 255));
		if (self::$verbose == TRUE)
			echo $this . ' constructed' . PHP_EOL;
	}

	public function __toString()
	{
		if (self::$verbose == TRUE)
			return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, $this->color )", $this->_x, $this->_y, $this->_z, $this->_w));
		else
			return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
			echo $this . ' destructed' . PHP_EOL;
	}

	public function getX()
	{
		return $this->_x;
	}

	public function getY()
	{
		return $this->_y;
	}

	public function getZ()
	{
		return $this->_z;
	}

	public function getW()
	{
		return $this->_w;
	}

	public function getColor()
	{
		return $this->_color;
	}

	public function setX($new_x)
	{
		$this->_x = $new_x;
	}

	public function setY($new_y)
	{
		$this->_y = $new_y;
	}

	public function setZ($new_z)
	{
		$this->_z = $new_z;
	}

	public function setW($new_w)
	{
		$this->_w = $new_w;
	}

	public function setColor($new_color)
	{
		$this->_color = $new_color;
	}
}

 ?>