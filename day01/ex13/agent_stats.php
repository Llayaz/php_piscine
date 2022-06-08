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
					$j = 1;
					$num = 0;
					$avg = 0;
					while ($db[$j])
					{
						if ($name_sorted[$i] == $db[$j][0] && $db[$j][1] != '' && $db[$j][2] != 'moulinette')
						{
							$avg += intval($db[$j][1]);
							$num++;
						}
						$j++;
					}
					if ($num != 0)
					{
						$res = $avg / $num;
						echo ($name_sorted[$i] .  ":" . $res . PHP_EOL);
					}
					$i++;
				}
			}
			if ($argv[1] == 'moulinette_variance')
			{
				$user_avg = array();
				$i = 0;
				while ($name_sorted[$i])
				{
					$j = 1;
					$num = 0;
					$nummou = 0;
					$avg = 0;
					$mou = 0;
					$mou_avg = 0;
					while ($db[$j])
					{
						if ($name_sorted[$i] == $db[$j][0] && $db[$j][1] != '' && $db[$j][2] != 'moulinette')
						{
							$avg += intval($db[$j][1]);
							$num++;
						}
						if ($name_sorted[$i] == $db[$j][0] && $db[$j][1] != '' && $db[$j][2] == 'moulinette')
						{
							$mou += intval($db[$j][1]);
							$nummou++;
						}
						$j++;
					}
					if ($num != 0)
					{
						if ($numm != 0)
							$mou_avg = $mou / $nummou;
						$res = $avg / $num;
						echo ($name_sorted[$i] .  ":" . ($res - $mou) . PHP_EOL);
					}
					$i++;
				}
			}
		}
		fclose($f);
	}
?>
