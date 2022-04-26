<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="columns">
    <div class="column product-column">
        <h1><?php echo $product["Name"]; ?></h1>
        <p><?php echo "$". number_format($product["Price"]); ?></p>
        <p><?php echo $product["Description"]; ?> </p>
        <form action="cart.php" method="post">
            <input type="hidden" name="add">
            <input type="hidden" name="product_id" value="<?php echo $product["ProductID"]; ?>">
            <input class="addToCartButton" type="submit" value="Add to Cart">
            <input type="number" class="quantitySelector" name="quantity" value="1">
        </form>
    </div>
    <div class="column image-column">
        <img class="product-image large" src="<?php echo $product['ProductImage']?>" alt="<?php echo $product["Name"]; ?>">
    </div>
</div>


<?php require_once __DIR__ . '/partials/footer.php';?>