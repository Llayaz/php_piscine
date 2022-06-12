<?php 

	require_once("conf.php");

	$new_prod = array(
		"name" => "Wave Sport Hydra",
		"price" => "1240",
		"colors" => "green");
	$last_id = db_insert("products", $new_prod);

	echo $last_id;

	$new_cat = array(
		"prod_id" => $last_id,
		"cat_id" => 2,
		"active" => 1
	);

	$last_id = db_insert("prod_cat_link", $new_cat);

	echo ",".$last_id;

 ?>