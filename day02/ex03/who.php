#!/usr/local/bin/php
<?php
	date_default_timezone_set('Europe/Helsinki');
	$fp = fopen("/var/run/utmpx", "rb");
	if ($fp)
	{
// utmpx record is 628 bytes long
		while ($file = fread($fp, 628))
		{
// 'a' code retains trailing null bytes, 'i' is signed integer, login size is 256 bytes, terminal identifier 4 bytes, terminal name 32, pid->process identifier, logintype (7 = process spawned by user), timestamp
		 $who = unpack("a256login/a4tid/a32tname/ipid/ilogintype/itstamp/", $file);
			if ($who['logintype'] == 7)
			{
				echo $who['login'] . " ";
				echo $who['tname'] . "  ";
//				echo trim($who['login']) . str_repeat(' ', 2);
//				echo trim($who['tname']) . str_repeat(' ', 2);
				echo date("M ", $who['tstamp']) . " ";
				echo date("j ", $who['tstamp']);
//				echo str_pad(date("j ", $who['tstamp']), 3, " ", STR_PAD_LEFT);
				echo date("H:i", $who['tstamp']) . " \n";
			}
		}
	}

//github.com/libyal/dtformats/blob/main/documentation/Utmp%20login%20records%20format.asciidoc
 ?>