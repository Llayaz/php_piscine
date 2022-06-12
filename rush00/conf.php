<?php 
	//$host  = "localhost";
	//$dbuser = "root";
	//$dbpass = "";
	//$dbname = "kayak_webshop";

	session_start();

	define('DBHOST', 'localhost');
	define('DBUSER', 'rush');
	define('DBPASS', 'rush123');
	define('DBNAME', 'kayak_webshop');

	require_once('db_handler.php');
	require_once('basket_handler.php');



 ?>