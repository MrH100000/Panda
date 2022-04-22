<?php require_once __DIR__ . '/partials/header.php'; 
    require_once __DIR__. '../model/queryProducts.php';?>
<center>
<h2>All students:</h2>
	<table id="all">
		<tr>
			<th>ProductID</th>
			<th>Product Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Product Image</th>
		</tr>
		<tr>
			<?php foreach ($productList as $product): ?>
				<td><?php echo $product["ProductID"]; ?></td>
				<td><?php echo $product["Name"]; ?></td>
				<td><?php echo $product["Description"]; ?></td>
				<td><?php echo $product["Price"]; ?></td>
				<td><?php echo $product["ProductImage"]; ?></td>
		</tr>
		    <?php endforeach ?>
    </table>
</center>

<?php require_once __DIR__ . '/partials/footer.php'; ?>