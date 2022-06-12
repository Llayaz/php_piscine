<?php 

	if(!isset($_SESSION['basket'])){
		//init basket
		$_SESSION['basket'] = array();
	}

	if(isset($_GET['action'])){

		$prod_id = db_escape($_GET['prod_id']);

		if($_GET['action'] == "add"){
			$prod = db_get_row("SELECT * FROM products WHERE id = $prod_id");
			
			//lets only add existing products
			if($prod){

				//check if the basket already contains the product
				$is_in_basket = false;
				foreach($_SESSION['basket'] as $key => $basket_item){
					//found and increase
					if($basket_item['prod_id'] == $prod_id){
						$_SESSION['basket'][$key]['amount'] ++;
						$is_in_basket = true;
						//echo "<p>increased</p>";
					}
				}

				//the product is not yet in the basket
				if(!$is_in_basket){
					$basket_item = array(
						"prod_id" => $prod["id"],
						"name" => $prod["name"],
						"price" => $prod["price"],
						"amount" => 1
					);
					$_SESSION['basket'][] = $basket_item;
					//echo "<p>added</p>";
				}
			}
		}

		if($_GET['action'] == "del"){
			foreach($_SESSION['basket'] as $key => $basket_item){
				//unset row in basket if the prod_id matches
				if($basket_item['prod_id'] == $prod_id){
					unset($_SESSION['basket'][$key]);
					//echo "<p>removed</p>";
				}

			}
		}
	}

	$basket_count = count($_SESSION['basket']);

 ?>