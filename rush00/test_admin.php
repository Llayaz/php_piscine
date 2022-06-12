<?php 

	require_once("conf.php");

	if(!isset($_SESSION['user_id'])){
		header("test_product_list.php");
		exit();
	}

	$user_id = db_escape($_SESSION['user_id']);
	$user = db_get_row("SELECT * FROM users WHERE id = $user_id");

	if(!$user || !$user['admin'])
		die("ACCESS DENIED");


	echo "I AM GROOT(admin)";

?>
