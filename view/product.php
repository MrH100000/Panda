<?php require_once __DIR__ . '/partials/header.php'; ?>
<center>
<h2>All Products:</h2>
    <?php foreach ($productList as $product): ?>
	    <div class='productCard'>
            <img src="<?php echo $product['ProductImage']?>" alt="<?php echo $product["Name"]; ?>" style="height:150px">
            <h1><?php echo $product["Name"]; ?> </h1>
            <p><?php echo "$". number_format($product["Price"]); ?></p>
            <p><?php echo $product["Description"]; ?> </p>
            <p> <button class='productButton'> Add to Cart </button></p>
        </div>
    <?php endforeach;?>
</center>

<?php require_once __DIR__ . '/partials/footer.php';?>