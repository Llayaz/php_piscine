<?php
//file_exists check if file or dir exists
//serialize makes date into string with retaining variable types
//checks if dir exists
	if (!(file_exists('../private')))
		mkdir('../private');
//	if (!file_exists('../private/passwd'))
//		file_put_contents('../private/passwd', null);
	$existingUser = 0;
	//if nothing is empty
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK") {
		//if the file already exists we unserialize it and check each entry if the username already exists
		if (file_exists('../private/passwd')) {
			$userlist = unserialize(file_get_contents('../private/passwd'));
			foreach($userlist as $user) {
				//if username exists we flag for error
				if ($user['login'] == $_POST['login'])
					$existingUser = 1;
			}
		}
		if ($existingUser == 1)
			echo "ERROR\n";
		else {
			//if username did not already exist we add the new array to the file
			$userlist[] = array('login' => $_POST['login'], 'passwd' => hash("whirlpool", $_POST["passwd"]));
			file_put_contents("../private/passwd", serialize($userlist));
			echo "OK\n";
		}
	}
	else
		echo "ERROR\n";
//		$hashedPwd =password_hash($_POST['passwd'], PASSWORD_DEFAULT);
?>