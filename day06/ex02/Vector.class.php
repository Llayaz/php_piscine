<?php 

require_once 'Color.class.php';
require_once 'Vertex.class.php';

class Vector {

	//vector is the displacement from the origin = position of vertex
	public static $verbose = FALSE;

	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;

	static function doc()
	{
		return file_get_contents('./Vector.doc.txt') . PHP_EOL;
	}

	public function __construct(array $vector_array)
	{
		if (isset($vector_array['orig']))
			$origin = $vector_array['orig'];
		else
			$origin = new Vertex (array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
		if(isset($vector_array['dest']))
		{
			$destination = $vector_array['dest'];
			$this->_x = $destination->getX() - $origin->getX();
			$this->_y = $destination->getY() - $origin->getY();
			$this->_z = $destination->getZ() - $origin->getZ();
		} 
		else
		{
			echo "Please provide destination vertex\n";
			exit;
		}
		if (self::$verbose == TRUE)
			echo $this . " constructed" . PHP_EOL;
	}

	public function __toString()
	{
		return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function __destruct()
	{
		if (self::$verbose == TRUE)
			echo $this . ' destructed' . PHP_EOL;
	}

//Magnitude is the length of the vector line, indicating the strength
	public function magnitude()
	{
		return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
	}

//Normalizing a vector changes its magnitude to 1 (unit vector) and keeps its direction
	public function normalize()
	{
		$magn = $this->magnitude();
		if ($magn == 1)
			return (clone($this));
		else
		{
		$norm = new Vector ( array ( 'dest' => new Vertex ( array (
			'x' => $this->_x / $magn, 
			'y' => $this->_y / $magn, 
			'z' => $this->_z / $magn
		))));
		}
		return $norm;
	}

	public function add( Vector $rhs )
	{
		$sum = new Vector (array ( 'dest' => new Vertex (array (
			'x' => $this->_x + $rhs->read_x(),
			'y' => $this->_y + $rhs->read_y(),
			'z' => $this->_z + $rhs->read_z()
		))));
		return $sum;
	}

	public function sub( Vector $rhs)
	{
		$diff = new Vector (array ( 'dest' => new Vertex (array (
			'x' => $this->_x - $rhs->read_x(),
			'y' => $this->_y - $rhs->read_y(),
			'z' => $this->_z - $rhs->read_z() ))));
		return $diff;
	}

	public function opposite ()
	{
		$opp = new Vector ( array ( 'dest' => new Vertex (array (
			'x' => - $this->_x, 
			'y' => - $this->_y, 
			'z' => - $this->_z
		))));
		return $opp;
	}

// scalar multiplication is multiplying all elements of the vector with the same constant
	public function scalarProduct ( $k )
	{
		$scalar = new Vector ( array ( 'dest' => new Vertex (array (
			'x' => $this->_x * $k,
			'y' => $this->_y * $k,
			'z' => $this->_z * $k
		))));
		return $scalar;
	}

	public function dotProduct( Vector $rhs )
	{
		$dot = (float)
			$this->_x * $rhs->read_x() +
			$this->_y * $rhs->read_y() +
			$this->_z * $rhs->read_z();
		return $dot;
	}

	public function cos ( Vector $rhs)
	{
		$dot = $this->dotProduct($rhs);
		$mag_1 = $this->magnitude();
		$mag_2 = $rhs->magnitude();
		$cos = (float)
			$dot / ($mag_1 * $mag_2);
		return $cos;
	}

	public function crossProduct ( Vector $rhs )
	{
		$crossVector = new Vector (array ('dest' => new Vertex ( array (
			'x' => $this->_y * $rhs->read_z() - $this->_z * $rhs->read_y(),
			'y' => $this->_z * $rhs->read_x() - $this->_x * $rhs->read_z(),
			'z' => $this->_x * $rhs->read_y() - $this->_y * $rhs->read_x()
		))));
		return $crossVector;
	}

	function read_x()
	{
		return $this->_x;
	}

	function read_y()
	{
		return $this->_y;
	}

	function read_z()
	{
		return $this->_z;
	}

	function read_w()
	{
		return $this->_w;
	}
}

//Normalizing explained: https://stackoverflow.com/questions/10002918/what-is-the-need-for-normalizing-a-vector
//Magnitude: https://www.vedantu.com/maths/magnitude-of-a-vector
//scalar multiplication https://slaystudy.com/c-multiply-vector-by-scalar/
//dot product https://www.mathsisfun.com/algebra/vectors-dot-product.html
//Calculating angle between two vectors https://onlinemschool.com/math/library/vector/angl/
 ?>
