#!/usr/local/bin/php
<?php 
	if ($argc > 2)
	{
		$key = $argv[1];
		for ($i = 2; $i < $argc; $i++)
		{
			$arr = explode(':', $argv[$i]);
			if ($arr[0] == $key)
				$res = $arr[1];
		}
		if (isset($res))
			echo $res."\n";
	}
 ?>