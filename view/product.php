<?php require_once __DIR__ . '/partials/header.php'; ?>
<center>
<div>
<h1>All Products:</h1>
</div>
    <?php foreach ($productList as $product): ?>
	    <div class='productCard'>
            <br>
            <img src="<?php echo $product['ProductImage']?>" alt="<?php echo $product["Name"]; ?>" style="height:150px">
            <h2><?php echo $product["Name"]; ?> </h2>
            <p><?php echo "$". number_format($product["Price"]); ?></p>
            <p><?php echo $product["Description"]; ?> </p>
            <p> <button class='productButton'> Add to Cart </button></p>
        </div>
    <?php endforeach;?>
</center>

<?php require_once __DIR__ . '/partials/footer.php';?>