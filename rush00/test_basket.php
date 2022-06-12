<?php 

	require_once("conf.php");

?>

<?php

	if($_SESSION['basket']){
		$total = 0;

?>

	<table>
		<thead>
			<th>ID</th>
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
				<td><?php echo $basket_item['prod_id'] ?></td>
				<td><?php echo $basket_item['name'] ?></td>
				<td>€<?php echo $basket_item['price'] ?></td>
				<td><?php echo $basket_item['amount'] ?></td>
				<td>€<?php echo $basket_item['amount'] * $basket_item['price'] ?></td>
				<td><a href="?action=del&prod_id=<?php echo $basket_item['prod_id']; ?>">REMOVE</a></td>
			</tr>

		<?php } ?>

		<tr>
			<td colspan="4">TOTAL</td>
			<td>€<?php echo $total ?></td>
		</tr>
		</tbody>

	</ul>

<?php }else{ ?>
	The basket is empty
<?php } ?>