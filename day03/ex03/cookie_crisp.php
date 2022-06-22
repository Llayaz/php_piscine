<?php
	$name = $_GET['name'];
	$value = $_GET['value'];

	if($_GET['action'] == "set" && $name && $value)
		setcookie($_GET['name'], $_GET['value']);
	if($_GET['action'] == "get" && $_COOKIE[$name])
			echo $_COOKIE[$_GET['name']]."\n";
	if($_GET['action'] == "del")
		setcookie($_GET['name'], '', time() - 3600);
?>
