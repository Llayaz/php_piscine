#!/usr/local/bin/php
<?php 
	if ($argc > 1)
	{
		$arr = array_filter(explode(' ', $argv[1]));
		$temp = $arr[0];
		$removed = array_shift($arr);
		for ($i = 0; $i < count($arr); $i++)
			echo "$arr[$i] ";
		echo $temp."\n";
	}
 ?>