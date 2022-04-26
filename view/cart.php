<?php require_once __DIR__ . '/partials/header.php'; ?>
<?php foreach ($productList as $product): ?>
        <a class="productLink" href="product.php?id=<?php echo($product['product']['ProductID']); ?>">
            <div class="productCard">
                <img src="<?php echo $product['product']['ProductImage']?>" alt="<?php echo $product['product']["Name"]; ?>">
                <div class="productDescription">
                    <h2><?php echo $product['product']["Name"]; ?> </h2>
                    <p><?php echo "$". number_format($product['product']["Price"]); ?></p>
                    <p><?php echo $product['quantity']; ?> </p>
                    <p><?php echo $product['product']["Description"]; ?> </p>
                </div>
            </div>
        </a>
    <?php endforeach;?>


<?php require_once __DIR__ . '/partials/footer.php';?>