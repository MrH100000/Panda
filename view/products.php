<?php require_once __DIR__ . '/partials/header.php'; ?>
<center>
    <h1>All Products:</h1>
</center>
<div class="productCards">
    <?php foreach ($productList as $product): ?>
        <a class="productLink" href="product.php?id=<?php echo($product['ProductID']); ?>">
            <div class="productCard">
                <img src="<?php echo $product['ProductImage']?>" alt="<?php echo $product["Name"]; ?>">
                <div class="productDescription">
                    <h2><?php echo $product["Name"]; ?> </h2>
                    <p><?php echo "$". number_format($product["Price"]); ?></p>
                    <p><?php echo $product["Description"]; ?> </p>
                </div>
                <div class="productFooter">
                    <button class="productButton">Add to Cart</button>
                </div>
            </div>
        </a>
    <?php endforeach;?>
</div>

<?php require_once __DIR__ . '/partials/footer.php';?>