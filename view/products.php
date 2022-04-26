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
                <form class="productFooter" action="cart.php" method="post">
                    <input type="hidden" name="add">
                    <input type="hidden" name="product_id" value="<?php echo $product["ProductID"]; ?>">
                    <input type="hidden" class="quantitySelector" name="quantity" value="1">
                    <input class="productButton" type="submit" value="Add to Cart">
                </form>
            </div>
        </a>
    <?php endforeach;?>
</div>

<?php require_once __DIR__ . '/partials/footer.php';?>