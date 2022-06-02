#!/usr/local/bin/php
<?php 

function	toup($match)
{
	$res = strtoupper($match[0]);
	return ($res);
}

function	magnify($match)
{
	$str = $match[0];

	//(?i) -> case insensitive, (?<= and ?= positive lookbehind and lookahead for exact pattern
	$str = preg_replace_callback('/(?i)(?<=title=\")(.*)(?=\")/', 'toup', $str);
	//.*? -> match any character unlimited times as few times as possible
	$str = preg_replace_callback('/>(.*?)</', 'toup', $str);
	return ($str);
}

if ($argc == 2 && file_exists($argv[1]))
{
	$page = file_get_contents($argv[1]);
	if (!$page)
		return ;
	$page = preg_replace_callback('/(?i)(<a href=(.*))(.*)<\/a>/', 'magnify', $page);
	echo $page;
}
 ?>
