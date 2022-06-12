<?php 

	require_once("conf.php");
		$updated_prod = array(
		"name" => "Prijon Aruna PriLite",
		"price" => "1990");
		$filter_array = array(
			'id' => 4,
			'active' => 0);
	db_update("products", $updated_prod, $filter_array);

 ?>