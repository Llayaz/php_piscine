#!/usr/local/bin/php
<?php 
	$p = fopen('php://stdin', 'r');
	while ($p && !feof($p))
	{
		echo "Enter a number: ";
		$num = fgets($p);
		if($num){
			$num = trim($num);
			if (!is_numeric($num))
				echo "'$num'is not a number\n";
			else
			{
				if ($num % 2 == 0)
					echo "The number '$num' is even\n";
				else
					echo "The number '$num' is odd\n";
			}
		} else
			echo "\n";
	}
	fclose($p);
 ?>