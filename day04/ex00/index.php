<?php 
	session_start();
	if ($_GET['submit'] === 'OK'){
		$_SESSION['name'] = $_GET['login'];
		$_SESSION['pwd'] = $_GET['passwd'];
	}
?>
<html><body>
<form method="GET">
	Username: <input type="text" name="login" value="<?php echo $_SESSION['name'] ?>"><br>
	Password: <input type="text" name="passwd" value="<?php echo $_SESSION['pwd'] ?>"><br>
	<input type="submit" name="submit" value="OK">
</form>
</body></html>