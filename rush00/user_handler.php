<?php 

	$user_id = 0;
	$is_admin = false;

	function auth($login, $passwd){
		$hashedPw = hash('sha256', $passwd);
		$login = db_escape($login);

		$user = db_get_row("SELECT id, login FROM users WHERE login = '{$login}' AND passwd = '{$hashedPw}' AND active = 1");
		
		if($user)
			return $user;

		return FALSE;

	}

	function register($login, $passwd){

		$login = db_escape($login);
		echo $login;
		$user = db_get_row("SELECT id FROM users WHERE login = '{$login}'");

		var_dump($user);
		if($user)
			return FALSE; //this login name is already used

		//register the user
		$hashedPw = hash('sha256', $passwd);
		$user_array = array(
			'login' => $login,
			'passwd' => $hashedPw
		);
		$user_id = db_insert('users', $user_array);
		if($user_id){
			$user_array = array(
				'user_id' => $user_id,
				'login' => $login
			);
			return $user_array;
		}
		return FALSE;
	}

	//logs the user in
	if(isset($_POST['login']) && isset($_POST['passwd'])){
		if($user_info = auth($_POST['login'], $_POST['passwd'])){
			$_SESSION['user_id'] = $user_info['id'];
			$_SESSION['login'] = $user_info['login'];
		}else if($user_info = register($_POST['login'], $_POST['passwd'])){
			$_SESSION['user_id'] = $user_info['id'];
			$_SESSION['login'] = $user_info['login'];
		}	
	}

	if(isset($_POST['user']) && $_POST['user'] == 'logout'){
		unset($_SESSION['user_id']);
		unset($_SESSION['login']);
	}

	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];

		$user = db_get_row("SELECT * FROM users WHERE id = $user_id");
		if($user){
			$is_admin = $user['admin'];	
		}
		
	}
	

 ?>
