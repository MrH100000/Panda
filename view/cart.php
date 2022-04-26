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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productList as $product): ?>
                    <tr>
                        <td><img class="cart-image" src="<?= $product['product']['ProductImage']; ?>" alt="<?= $product['product']["Name"]; ?>"></td>
                        <td><?= $product['product']["Name"]; ?></td>
                        <td><?= "$" . number_format($product['product']["Price"]); ?></td>
                        <td><?= number_format($product['quantity']); ?></td>
                        <td>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="product_id" value="<?= $product['product']["ProductID"] ?>">
                                <input type="hidden" name="delete">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cart-footer">
            <strong>Total:</strong> <?= "$" . number_format($cartTotal); ?>
        </div>
    </div>
</div>
<div class="cart-area">
    <?php if(!isset($_SESSION['loggedIn'])): ?>
        <button><a
            class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/login')) { print('active'); } ?>"
            href="login.php">Login to Checkout</a></button>
    <?php endif; ?>
    <?php if(isset($_SESSION['loggedIn'])): ?>
        <button><a
            class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/checkout')) { print('active'); } ?>"
            href="checkout.php">Click to Checkout</a></button>
    <?php endif; ?>
</div>


<?php require_once __DIR__ . '/partials/footer.php';?>