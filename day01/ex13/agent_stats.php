#!/usr/bin/php
<?php

	$f = fopen( 'php://stdin', 'r' );
	$db = array();
	if ($f)
	{
		while ($line = fgets($f))
			$db[] = explode(';', $line);
		if ($argc == 2)
		{
			$i = 1;
			$num = -1;
			$mouli = 0;
			$data_av = array();
			$name = array();
			$name_sorted = array();
			$user_avg = array();
			while ($db[$i])
			{
				$name[] = $db[$i][0];
				if ($db[$i][2] != "moulinette")
					$name[] = $db[$i][2];
				if($db[$i][1] != '' && $db[$i][2] != "moulinette")
				{
					$data_av[] = $db[$i][1];
					$num++;
				}
				if($db[$i][1] != '' && $db[$i][2] == "moulinette")
					$mouli += $db[$i][1];
				$i++;
			}
			$name = array_unique($name);
			foreach($name as $val)
				$name_sorted[] = $val;
			sort($name_sorted);
			if($argv[1] == 'average')
			{
				
				$sum = array_sum($data_av);
				$average = $sum / $num;
				echo $average . "\n";
			}
			if ($argv[1] == 'average_user')
			{
				$i = 0;
				while ($name_sorted[$i])
				{
					echo $name_sorted[$i];
					$j = 1;
					$num = 0;
					$avg = 0;
					while ($db[$j])
					{
						if ($name_sorted[$i] == $db[$j][0] && $db[$j][1] != '')
						{
							echo $db[$j][1];
							$avg += intval($db[$j][1]);
							$num++;
	//						echo $db[$j][1] . PHP_EOL;
	//						echo $avg .  "\n";
						}
	//						$user_avg[$name_sorted[i]] += intval($db[$j][1]);
						$j++;
	//					echo $db[$j][1] . PHP_EOL;
						}
	//					echo $avg .  "\n";
	//					echo $user_avg[$name_sorted[i]] . "\n";
	//					$user_avg[$name_sorted[$i]] = $user_avg[$name_sorted[$i]] / $j;
						echo "\n" . $avg . " " . $num . "\n"; 
						$res = $avg / $num;
						echo ($name_sorted[$i] .  " : " . $res . PHP_EOL);
						$i++;
				}
			/*	foreach($name_sorted as $value)
				{
					$user_avg[$value] = 0;
					while ($db[$i])
					{
						if ($value == $db[$i][2] && $db[$i][1] != '')
						$user_avg[$value] += $db[$i][1];
						$num++;
						$i++;
					}
					$res = $user_avg[$value] / $num;
					echo "$value : $res\n";
				}*/

			}
			if ($argv[1] == 'moulinette_variance')
			{
				echo "test3";
			}
		}
		fclose($f);
	}
?>
