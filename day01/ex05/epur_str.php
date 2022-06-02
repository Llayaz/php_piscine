#!/usr/local/bin/php
<?php 
	if ($argc != 2)
		exit (0);
	$str = trim($argv[1]);
	$arr = array_filter(explode(' ', $str));
	$str = implode(' ', $arr);
	echo $str."\n";
 ?>