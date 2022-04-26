<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="columns">
    <div class="column product-column">
        <h1><?php echo $product["Name"]; ?></h1>
        <p><?php echo "$". number_format($product["Price"]); ?></p>
        <p><?php echo $product["Description"]; ?> </p>
        <!-- <button class="productButton">Add to Cart</button> -->
        <form action="product_change.php" method="post">
            <input type="hidden" name="edit">
            <input type="hidden" name="id" value="<?php echo $product['ProductID']?>">
            <input class="editButton" type="submit" value="Edit Item">
        </form>
        <form action="product_change.php" method="post">
            <input type="hidden" name="delete">
            <input type="hidden" name="id" value="<?php echo $product['ProductID']?>">
            <input class="deleteButton" type="submit" value="Delete Item">
        </form>
    </div>
    <div class="column image-column">
        <img class="product-image large" src="<?php echo $product['ProductImage']?>" alt="<?php echo $product["Name"]; ?>">
    </div>
</div>
<?php if (isset($error_message)): ?>
    <div class="errorMessage">
        <strong>Error:</strong>
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>


<?php require_once __DIR__ . '/partials/footer.php';?>