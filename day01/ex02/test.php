#!/usr/local/bin/php
<?php
	while (1)
	{
		echo "Enter a number: ";	
		if ($nb = fgets(STDIN))
		{
			$nb = trim($nb);
			if (!(is_numeric($nb)))
			{
				echo "'$nb' is not a number \n";
				continue;
			}
			$res = intval($nb);
			if ($res % 2 == 1)
				echo "The number $res is odd";
			else
				echo "The number $res is even";
			echo "\n";
		}
		else
		{
			echo "\n";
			exit (0);
		}
	}
?>
