#!/usr/local/bin/php
<?php 
	function is_arith($str)
	{
		if ($str != '+' && $str != '-' && $str != '*' && $str != '/' &&$str != '%')
			return (0);
		return (1);
	}

	if ($argc == 2)
	{
		$res = $argv[1];
		trim($res);
		$parts = sscanf($res, "%d %c %d %s");
		if (!is_numeric($parts[0]) || !is_numeric($parts[2]) || $parts[3] || !is_arith($parts[1]))
		{
			echo "Syntax Error\n";
			return ;
		}
		$matches = array();
		$res = preg_replace('/\s+/', '', $argv[1]);
		if (preg_match('/(-?[\d\.]+)([\+\-\*\/])(\-?[\d\.]+)/', $res, $matches) !== false)
		{
			$operator = $matches[2];
			switch($operator){
				case '+':
					echo ($matches[1] + $matches[3]);
					break;
				case '-':
					echo ($matches[1] - $matches[3]);
					break;
				case '*':
					echo ($matches[1] * $matches[3]);
					break;
				case '/':
					if ($matches[3] == 0)
						echo ("INF");
					else 
						echo ($matches[1] / $matches[3]);
					break;
				case '%':
					echo ($matches[1] % $matches[3]);
					break;
			}
			echo "\n";
		}
	}
	else
		echo "Incorrect Parameters\n";
 ?>
