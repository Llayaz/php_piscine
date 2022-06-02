<?php 
	$user = 'zaz';
	$password = 'Ilovemylittleponey';
	$png = base64_encode(file_get_contents('../img/42.png'));
	if ($_SERVER['PHP_AUTH_USER'] == $user && $_SERVER['PHP_AUTH_PW'] == $password)
	{
		echo "<html><body>" . "Welcome Zaz<br />" . "<img src='data:image/png;base64," . $png . "'>" . "</body></html>";
	}
	else {
		header('HTTP/1.0 401 Unauthorized');
		header('WWW-Authenticate: Basic realm=\'\'Member area\'\'');
		echo "<html><body>That area is accessible for members only</body></html>";
	}
?>