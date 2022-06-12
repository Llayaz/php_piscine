<?php 

	$user_id = 0;
	$is_admin = false;

	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];

		$user = db_get_row("SELECT * FROM users WHERE id = $user_id");
		if($user){
			$is_admin = $user['admin'];	
		}
		
	}

	function auth($login, $passwd){
		$hashedPw = hash($passwd);
		$login = db_escape($login);

		$user = db_get_row("SELECT id, login FROM users WHERE login = '{$login}' AND passwd = '{$hashedPw}' AND active = 1");
		
		if($user)
			return $user;

		return FALSE;

	}

	function register($login, $passwd){

		$login = db_escape($login);
		$user = db_get_row("SELECT id FROM users WHERE login = '{$login}'");
		if($user)
			return FALSE; //this login name is already used

		//register the user
		$hashedPw = hash($passwd);
		$user_array = array(
			'login' => $login,
			'passwd' => $hashedPw
		);
		db_insert('users', $user_array);
		return $user_array;

	}

	//logs the user in
	if(isset($_GET['login']) && isset($_GET['passwd'])){
		if($user_info = auth($_GET['login'], $_GET['passwd'])){
			$_SESSION['user_id'] = $user_info['id'];
			$_SESSION['login'] = $user_info['login'];
		}else if($user_info = register($_GET['login'], $_GET['passwd'])){
			$_SESSION['user_id'] = $user_info['id'];
			$_SESSION['login'] = $user_info['login'];
		}	
	}
	

 ?>