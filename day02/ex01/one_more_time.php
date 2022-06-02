#!/usr/local/bin/php
<?php 
	if ($argc == 2)
	{
		$month = array();
		$month['janvier'] = 'jan';
		$month['février'] = 'feb';
		$month['mars'] = 'mar';
		$month['avril'] = 'apr';
		$month['mai'] = 'may';
		$month['juin'] = 'jun';
		$month['juillet'] = 'jul';
		$month['août'] = 'aug';
		$month['septembre'] = 'sep';
		$month['octobre'] = 'oct';
		$month['novembre'] = 'nov';
		$month['decembre'] = 'dec';
		$date = strtolower($argv[1]);
		if (preg_match('/^\b(?:lundi?|mardi?|mercredi?|jeudi?|vendredi?|samedi?|dimanche) (0[0-3]|1[0-9]) \b(?:janvier?|février?|mars?|avril?|mai?|juin?|juillet?|août?|septembre?|octobre?|novembre?|décembre) (\d{4}) (\d{2}:\d{2}:\d{2})$/', $date))
		{
			$arr = explode(' ', $date);
			$key = $arr[2];
			$arr[2] = $month[$key];
			array_shift($arr);
			$str = implode(' ', $arr);
			echo (strtotime($str))."\n";
		} 
		else
			echo ("Wrong Format\n");
//		echo (date("Y m d H:i:s", strtotime($str)));
	}
 ?>