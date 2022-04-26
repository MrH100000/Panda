<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="cart-area">
    <div class="cart-card">
        <table class="cart-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Price Each</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productList as $product): ?>
                    <tr>
                        <td><img class="cart-image" src="<?= $product['product']['ProductImage']; ?>" alt="<?= $product['product']["Name"]; ?>"></td>
                        <td><?= $product['product']["Name"]; ?></td>
                        <td><?= "$" . number_format($product['product']["Price"]); ?></td>
                        <td><?= number_format($product['quantity']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php require_once __DIR__ . '/partials/footer.php';?>