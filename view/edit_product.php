<?php require_once __DIR__ . '/partials/header.php'; ?>
<center>
    <h1>Edit Products:</h1>
</center>
<div class="productCards">
<?php foreach ($productList as $product): ?>
        <a class="productLink" href="productChange.php?id=<?php echo($product['ProductID']); ?>">
            <div class="productCard">
                <img src="<?php echo $product['ProductImage']?>" alt="<?php echo $product["Name"]; ?>">
                <div class="productDescription">
                    <h2><?php echo $product["Name"]; ?> </h2>
                    <p><?php echo "$". number_format($product["Price"]); ?></p>
                    <p><?php echo $product["Description"]; ?> </p>
                </div>
                <div class="productFooter">
                    <button class="productButton">Click to Edit / Delete</button>
                </div>
            </div>
        </a>
    <?php endforeach;?>
    <div class="productLink">
        <div class="productCard">
            <form action="edit_products.php" method="post">
                <img src="images/addProduct.png" alt="add product">
                <div class="productDescription">
                    <label> Enter Product Information: </label>
                    <br>
                    <label>Product Name:</label>
                    <input type="text" name="name" required>
                    <br>
                    <label>Product Price:</label>
                    <input type="number" name="price" required>
                    <br>
                    <label>Product Description:</label>
                    <input type="text" name="description" required>
                    <br>
                    <label>Product Image Source:</label>
                    <input type="text" name="image" required>
                </div>
                <div class="productFooter">
                    <input class="productButton" type="submit" name="submit" value="Add Product">
                </div>
            </form>
        </div>
    </div>
</div>
<?php if (isset($error_message)): ?>
    <div class="errorMessage">
        <strong>Error:</strong>
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>
<?php require_once __DIR__ . '/partials/footer.php';?>