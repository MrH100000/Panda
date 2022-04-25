<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="columns">
    <div class="column product-column">
        <h1><?php echo $product["Name"]; ?></h1>
        <p><?php echo "$". number_format($product["Price"]); ?></p>
        <p><?php echo $product["Description"]; ?> </p>
        <!-- <button class="productButton">Add to Cart</button> -->
        <form action="product.php?test" method="get">
            <input class="addToCartButton" type="submit" value="Add to Cart">
        </form>
    </div>
    <div class="column image-column">
        <img class="product-image large" src="<?php echo $product['ProductImage']?>" alt="<?php echo $product["Name"]; ?>">
    </div>
</div>


<?php require_once __DIR__ . '/partials/footer.php';?>