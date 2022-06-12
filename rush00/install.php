<?php
    session_start();
?>

<html>
<body>
    <h2>Install Database</h2>
    <form method="GET">
        Servername: <input type="text" name="servername" value="localhost" required />
        <br>
        Username: <input type="text" name="username" value="root" required />
        <br>
        Password: <input type="password" name="password" value="" required />
        <br>
        <input type="submit" name="submit" value="OK">
    </form>    
</body>
</html>

<?php

	if($_GET['submit'] == "OK")
	{
		if (!$_GET['servername'] || !$_GET['username'] || !$_GET['password'])
			echo "Error\n";

		$servername = $_GET['servername'];
		$username = $_GET['username'];
		$passwd = $_GET['password'];

		$conn = mysqli_connect($servername, $username, $passwd);
		if (!$conn)
		{
			echo "Plase specify the place for the database to be saved!\n";
			die ("Error: " . mysqli_connect_error());
		}
/*		$_SESSION["servername"] = $_GET["servername"];
		$_SESSION["login"] = $_GET["username"];
		$_SESSION["password"] = $_GET["password"];*/
/*		$init_user = "CREATE USER 'rush'@'localhost' IDENTIFIED BY 'rush123'; 
				UPDATE mysql.user SET max_questions = 0, max_updates = 0, max_connections = 0 WHERE User = 'rush' AND Host = 'localhost';
				GRANT CREATE USER, ALTER, SUPER, REPLICATION CLIENT, DELETE, CREATE TEMPORARY TABLES, SHOW DATABASES, INSERT, UPDATE, EVENT, ALTER ROUTINE,
				GRANT OPTION, PROCESS, INDEX, SHUTDOWN, SHOW VIEW, REPLICATION SLAVE, REFERENCES, CREATE ROUTINE, DROP, FILE, SELECT, CREATE, EXECUTE,
				CREATE VIEW, CREATE TABLESPACE, RELOAD, TRIGGER, LOCK TABLES ON . TO 'rush'@'localhost'; FLUSH PRIVILEGES;";*/
		$init_user = "
		CREATE USER 'rush2'@'localhost' IDENTIFIED BY 'rush123';
		UPDATE mysql.user SET max_questions = 0, max_updates = 0, max_connections = 0 WHERE User = 'rush2' AND Host = 'localhost';
		GRANT CREATE USER, ALTER, SUPER, REPLICATION CLIENT, DELETE, CREATE TEMPORARY TABLES, SHOW DATABASES, INSERT, UPDATE, EVENT, ALTER ROUTINE, GRANT OPTION, PROCESS, INDEX, SHUTDOWN, SHOW VIEW, REPLICATION SLAVE, REFERENCES, CREATE ROUTINE, DROP, FILE, SELECT, CREATE, EXECUTE, CREATE VIEW, CREATE TABLESPACE, RELOAD, TRIGGER, LOCK TABLES ON . TO 'rush2'@'localhost';
		FLUSH PRIVILEGES;
	";
	echo $init_user;
		if (mysqli_query($conn, $init_user) == FALSE)
			echo "oops";
		else
			echo "yeay";

		echo "USER created\n";
		echo "<hr>";

		$init_db = "DROP DATABASE IF EXISTS `kayak_webshop`;";
		$init_db = "CREATE DATABASE IF NOT EXISTS `kayak_webshop`;";
		mysqli_query($conn, $init_db);

		echo "DB created\n";

		mysqli_select_db($conn, 'kayak_webshop');

		echo "<hr>";

		$sqlScript = file('kayak_webshop.sql');
		foreach($sqlScript as $line)
		{
			$startWith = substr(trim($line), 0, 2);
			$endWith = substr(trim($line), -1, 1);
			if (empty($line) || $startWith == "--" || $startWith == "/*")
				continue;
			$query = $query . $line;
			if ($endWith == ";")
			{
				mysqli_query($conn, $query) or die ('<div> class="error-response sql-import-response">Problem in executing the SQL query <b> ' . $query . ' </b></div>');
				$query = '';
				echo 'processed line <br>';
			}
		}

		echo "<hr>";
		echo "DB import successful";
		mysqli_close($conn);
	}
?>
