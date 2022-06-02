#!/usr/local/bin/php
<?php
	$arg = 1;
	$arr = array();
	function compare($str1, $str2)
	{
		$i = 0;
		$line = "abcdefghijklmnopqrstuvwxyz0123456789!\"
				#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
		while (($i < strlen($str1)) || ($i < strlen($str2)))
		{
			$str1_sorted = stripos($line, $str1[$i]);
			$str2_sorted = stripos($line, $str2[$i]);
			if ($str1_sorted > $str2_sorted)
				return (1);
			else if ($str1_sorted < $str2_sorted)
				return (-1);
			else
				$i++;
		}
	}
	foreach ($argv as $elem)
	{
		if ($arg++ > 1)
		{
			$temp = preg_split("/ +/", trim($elem));
			if ($temp[0] != "")
				$arr = array_merge($arr, $temp);
		}
	}
	usort($arr, "compare");
	foreach ($arr as $elem)
		echo "$elem"."\n";
?>
