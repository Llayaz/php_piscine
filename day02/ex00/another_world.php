#!/usr/local/bin/php
<?php 
	if ($argc > 1)
	{
		$str = trim($argv[1]);
		$res = preg_replace('/\s+/', ' ', $str);
		$res = preg_replace('/\t+/', ' ', $res);
		echo $res."\n";
	}
 ?>