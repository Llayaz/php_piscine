#!/usr/local/bin/php
<?php
function isSign($char)
{
	if ($char == '+' || $char == '-' || $char == '*' || $char == '/' || $char == '%')
		return true;
	return false;
}
function ft_arth($a, $b, $sign)
{
	switch ($sign)
	{
		case '+':
			echo $a + $b . "\n";
			break;
		case '-':
			echo $a - $b . "\n";
			break;
		case '*':
			echo $a * $b . "\n";
			break;
		case '/':
			echo $a / $b . "\n";
			break;
		case '%':
			echo $a % $b . "\n";
			break;
	}
}
	if ($argc == 2){
		$a = "";
		$b = "";
		$i = 0;
		$cnt = 0;
		$str = trim($argv[1]);
		for($idx = 0; $idx < strlen($str); $idx++){
			if (isSign($str[$idx]))
				$cnt += 1;
			if ($str[$idx] == "-" && $cnt > 0 && !is_numeric($str[$idx + 1]))
				exit("syntax error");
		}
		$str = preg_replace('/\s+/', '',  $str);
		while($i < strlen($str)){
			$a .= $str[$i];
			$i++;
			if(isSign($str[$i]))
				break;
		}
		$sign= $str[$i];
		$i++;
		if(!is_numeric($str[$i]) && $str[$i] != "-")
			exit("syntax error");
		while($i < strlen($str)){
			$b .= $str[$i];
			$i++;
			if(isSign($str[$i]))
				break;
		}
		if (!is_numeric($a) && !is_numeric($b))
			exit("syntax error");
		ft_arth($a, $b, $sign);
	}
	else
		echo "Incorrect Parameters\n";
?>
