<?php 
	foreach ($_GET as $key => $value) {
		echo ("$key : $value\n");
	}
 ?>

 <form method="GET">
 	<input type="text" name="valami" value="<?php echo $_GET['valami'] ?>">
 	<select name="list">
 		<option value="1">one</option>
 		<option value="2">two</option>
 		<option value="3">three</option>
 		<option value="4">four</option>
 	</select>
 	<input type="submit" name="" value="Send">
 </form>