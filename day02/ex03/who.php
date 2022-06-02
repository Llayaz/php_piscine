#!/usr/local/bin/php
<?php 
	$fp = fopen("/var/run/utmpx", "rb");
	if (!$fp)
		return ;
	while (!feof($fp))
		var_dump(fread($fp));
//	$data = file_get_contents("/var/run/utmpx");
//	var_dump($data);
//	preg_match_all('/(.*)/', $fp, $matches);
//	var_dump($matches);
 ?>