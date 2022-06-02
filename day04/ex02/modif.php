<?php
	function changepw($database, $hashedOldPw, $hashedNewPw) {
		foreach($database as $index => $value){
			if ($value['login'] == $_POST['login']) {
				if ($value['passwd'] == $hashedOldPw) {
					$database[$index]['passwd'] = $hashedNewPw;
					file_put_contents('../private/passwd', serialize($database));
					return TRUE;
				}
			}
		}
		return FALSE;
	}

	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] == "OK")
	{
		$database = unserialize(file_get_contents('../private/passwd'));
		$hashedOldPw = hash('whirlpool', $_POST['oldpw']);
		$hashedNewPw = hash('whirlpool', $_POST['newpw']);
		echo (changepw($database, $hashedOldPw, $hashedNewPw)) ? "OK\n" : "ERROR\n";
	} else
		echo "ERROR\n";
?>