#!/usr/local/bin/php
<?php 
//res[] = $arr[$i] -> adding to end of array
	$container = array("1");
	//$container = [];
	$container[3] = "2";


	$i = 1;
	if ($argc > 1)
	{
		$res = array();
		while ($i < $argc)
		{
			$argv[$i] = trim($argv[$i]);
			$arr[$i] = explode(' ', $argv[$i]);
			$res[] = $arr[$i];
			$i++;
		}
		sort($res);
		for ($j = 0; $j < count($res); $j++)
			echo "$res[$j]\n";
	}
 ?>