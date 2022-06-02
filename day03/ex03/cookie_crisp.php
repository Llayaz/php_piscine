<?php
//_GET contains the array given in url as key=value pairs separated by &
if($_GET['action'] == "set")
	setcookie($_GET['name'], $_GET['value']);
if($_GET['action'] == "get")
	echo ($_COOKIE[$_GET['name']]);
if($_GET['action'] == "del")
	setcookie($_GET['name'], '', 0);
//setting expiration date to past
?>