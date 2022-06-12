<?php
	require_once('conf.php');
	if($_SESSION['basket']){
		$total = 0;
	}
		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>online shop</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<header>
		<div class="leftBar">
			<div class="company">
				we sell stuff that floats
			</div>
			<div class="dropdown">
    			<button class="dropbtn">DROPDOWN ONE
    			</button>
   				<div class="dropdown-content">
    		 		 <a href="#">Link 1</a>
     				 <a href="#">Link 2</a>
     				 <a href="#">Link 3</a>
    			</div>
 			 </div>
			 <div class="dropdown">
    			<button class="dropbtn">DROPDOWN TWO
    			</button>
   				<div class="dropdown-content">
    		 		 <a href="#">Link 1</a>
     				 <a href="#">Link 2</a>
     				 <a href="#">Link 3</a>
    			</div>
 			</div>
		</div>
		<div class="controlPanel">
			<div class="login">
			<form action="./user/login.php" method="post">
				Username: <input type="text" name="login">
				<br />
				Password : <input type="password" name="passwd">
				<input type="submit" name="submit" value="OK">
				<br />
				<a href="./user/create.html">create an account</a>
				<br />
				<a href="./user/modif.html">modify an account</a>
			</form>
		</div>
			<div class="basket">
				<a href="./cart.php">
					<img src="./img/cart.jpeg" alt="basket" max width="100vw">
				</a>
			</div>
		</div>
	</header>
	<body>
		<div class="cartPage">
				<?php

				if($_SESSION['basket']){
					$total = 0;

				?>
				<table class="cart_table">
					<thead>
						<th>Name</th>
						<th>Price</th>
						<th>Amount</th>
						<th>Total</th>
						<th></th>
					</thead>
					<tbody>
					
					<?php
						foreach ($_SESSION['basket'] as $basket_item) {
							$total += $basket_item['amount'] * $basket_item['price'];
					?>
						<tr>
							<a href=""></a>
							<td><?php echo $basket_item['name'] ?></td>
							<td>€<?php echo $basket_item['price'] ?></td>
							<td><?php echo $basket_item['amount'] ?></td>
							<td>€<?php echo $basket_item['amount'] * $basket_item['price'] ?></td>
							<td><a href="?action=del&prod_id=<?php echo $basket_item['prod_id']; ?>">REMOVE</a></td>
						</tr>

					<?php } ?>

					<tr>
						<td class="table_total" colspan="3">TOTAL</td>
						<td>€<?php echo $total ?></td>
					</tr>
					</tbody>

				</ul>

				<?php }else{ ?>
				The basket is empty
				<?php } ?>


		</div>
	</body>
</html>
