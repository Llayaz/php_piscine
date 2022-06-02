#!/usr/local/bin/php
<?php 
	if ($argc == 4)
	{
		$first = trim($argv[1]);
		$operator = trim($argv[2]);
		$second = trim($argv[3]);
		if ($operator == '+')
		{
			$res = $first + $second;
			echo $res."\n";
		}
		else if ($operator == '-')
		{
			$res = $first - $second;
			echo $res."\n";
		}
		else if ($operator == '*')
		{
			$res = $first * $second;
			echo $res."\n";
		}
		else if ($operator == '/')
		{
			$res = $first / $second;
			echo $res."\n";
		}
		else
		{
			$res = $first % $second;
			echo $res."\n";
		}
	}
	else
		echo "Incorrect Parameters\n";
 ?>