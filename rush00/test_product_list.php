<?php 

	require_once("conf.php");

	$query = "SELECT *
			FROM products
			WHERE active = 1
			ORDER BY id DESC
			LIMIT 2";
	$products = db_get_results($query);

	if(isset($_GET['whatnot'])){

		$category = db_escape($_GET['whatnot']);
		
		$query = "SELECT products.*
			FROM products 
			INNER JOIN prod_cat_link ON prod_cat_link.prod_id = products.id AND prod_cat_link.cat_id = $category
			WHERE products.active = 1

			/*ORDER BY id DESC
			LIMIT 2*/";
		$products = db_get_results($query);	
	}

	$query = "SELECT *
			FROM product_categories
			WHERE active = 1";

	$categories = db_get_results($query);

?>

<div>
	<?php echo ($basket_count)? "You have {$basket_count} item(s) in your basket" : "Your basket is empty"; ?>
</div>

<ul>
	<?php foreach ($categories as $category) { ?>
		<li><a href="?whatnot=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a></li>
	<?php } ?>
</ul>

<ul>
	<?php foreach ($products as $product) { ?>
		<li>
			<?php echo $product['name'] ?>
			<a href="?action=add&prod_id=<?php echo $product['id']; ?>">Add to basket</a>
		</li>
	<?php } ?>
</ul>