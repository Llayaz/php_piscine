#!/usr/bin/php
<?php 
function	toup($match)
{
	$res = strtoupper($match[0]);
	return ($res);
}

function	magnify($match)
{
	$str = $match[0];
	//(?i) -> case insensitive, (?<=  positive lookbehind for exact pattern, (.*?) as few times as possible
	$str = preg_replace_callback('/(?mis)(?<=title=\")(.*?)(\")/', 'toup', $str);
	//.*? -> match any character unlimited times as few times as possible
	$str = preg_replace_callback('/(?mis)>(.*?)</', 'toup', $str);
	return ($str);
}

if ($argc == 2 && file_exists($argv[1]))
{
	$page = file_get_contents($argv[1]);
	if (!$page)
		return ;
	$page = preg_replace_callback('/(?mis)(<a(.*))(.*)<\/a>/', 'magnify', $page);
	echo $page;
}
?>
