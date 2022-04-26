<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="columns">
    <div class="column product-column">
        <form action="product_change.php" method="post">
            <label> Product Name: </label>
            <p><input type="text" name="name" value="<?php echo $product["Name"]; ?>"></p>
            <br>
            <label> Price: </label>
            <p><input type="text" name="price" value="<?php echo $product["Price"]; ?>"></p>
            <br>
            <label> Description: </label>
            <p><input type="text" name="description" value="<?php echo $product["Description"]; ?>"></p>
            <br>
            <label> Image Source: </label>
            <p><input type="text" name="productImage" value="<?php echo $product["ProductImage"]; ?>"></p>
            <br>
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