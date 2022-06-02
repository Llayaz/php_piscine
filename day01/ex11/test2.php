#!/usr/local/bin/php
<?php
	if ($argc == 1 || $argc > 2)
	{
		echo "Incorrect Parameters".PHP_EOL;
		return ;
	}
	$check = sscanf($argv[1], "%d %c %d %s");
    if (count($check) != 4 || !is_numeric($check[0]) || !is_numeric($check[2]) || $check[3]) {
        echo "Syntax Error\n";
        exit (1);
    }
    $num1 = $check[0];
    $num2 = $check[2];
    $op = $check[1];
	if ($op === "+")
		echo ($num1 + $num2);
	if ($op === "-")
		echo ($num1 - $num2);
	if ($op === "*")
		echo ($num1 * $num2);
	if ($op === "/")
	{
		if ($num2 === 0)
			echo "Inf";
		else
			echo ($num1 / $num2);
	}
	if ($op === "%")
	{
		if ($num2 === 0)
			echo "Undefined";
		else
			echo ($num1 % $num2);
	}
	echo PHP_EOL;
	?>
