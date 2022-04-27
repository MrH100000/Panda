<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="cart-area">
    <div class="card large">
        <h1 class="card-heading">Cart</h1>
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
                                <input class="button" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cart-footer footer-content">
            <div class="footer-left">
                <span><strong>Subtotal:</strong> <?= "$" . number_format($cartTotal); ?></span>
            </div>
            <div class="footer-right">
                <?php if(isset($_SESSION['loggedIn'])): ?>
                    <form action="checkout.php" method="get">
                        <input class="button" type="submit" value="Checkout">
                    </form>
                <?php else: ?>
                    <form action="login.php" method="get">
                        <input type="hidden" name="next" value="checkout">
                        <input class="button" type="submit" value="Log in to checkout">
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php require_once __DIR__ . '/partials/footer.php';?>