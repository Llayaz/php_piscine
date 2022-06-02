<?php
	function auth($login, $passwd) {
		$hashedPw = hash($passwd);
		$database = unserialize(file_get_contents('../private/passwd'));
		foreach($database as $index => $value){
			if ($value['login'] == $login) {
				if ($value['passwd'] == $hashedOldPw)
					return TRUE;
			}
		}
		return FALSE;
	}
?>