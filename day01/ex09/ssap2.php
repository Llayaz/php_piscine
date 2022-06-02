#!/usr/local/bin/php
<?php 
	function cmp_char($a, $b)
	{
		if (ctype_alpha($a))
		{
			if (ctype_alpha($b))
				return ($a <=> $b);
			else
				return (-1);
		}
		if (is_numeric($a))
		{
			if (is_numeric($b))
				return ($a <=> $b);
			if (ctype_alpha($b))
				return (1);
			else
				return (-1);
		}
		if (ctype_alnum($b))
			return (1);
		return ($a <=> $b);
	}

	function cmp($a_str, $b_str)
	{
		$i = 0;
		$a = strtolower($a_str);
		$b = strtolower($b_str);
		$a_len = strlen($a);
		$b_len = strlen($b);
		$len = min(strlen($a), strlen($b));
		while ($i < $len)
		{
			if (cmp_char($a[$i], $b[$i]) == 1)
				return (1);
			if (cmp_char($a[$i], $b[$i]) == -1)
				return (-1);
			$i++;
		}
		return ($a_len <=> $b_len);
	}

	$i = 1;
	$res = array();
	if ($argc > 1)
	{
		while ($i < $argc)
		{
			$argv[$i] = trim($argv[$i]);
			$res = array_merge($res, explode(' ', $argv[$i]));
			$i++;
		}
		usort($res, "cmp");
		for ($j = 0; $j < count($res); $j++)
			echo $res[$j]."\n";
	}
 ?>