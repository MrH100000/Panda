<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="cart-area">
    <div class="cart-card">
        <center>
            <img src="images/logo-square.png" alt="mvc panda logo" style="height: 50px; width:200px">
            <h2> MVC Panda </h2>
            <h3> Thanks you for your purchase </h3>
        </center>
        <div>
            <strong>Shipping Information: </strong><br>
            <strong>Name: </strong> <?php echo $_SESSION['firstName'] ." ". $_SESSION['lastName'];?><br>
            <strong>Address:</strong> <?php echo $orderInformation['Address'];?><br>
            <label><?php echo $orderInformation['City'] . ', ' . $orderInformation['State'] ." ". $orderInformation['ZipCode'] . ', ' . $orderInformation['Country'];?></label><br>
            <br>
            <strong> Payment Type: </strong><br>
            <label><?php echo $orderInformation['PaymentType'];?> </label><br>
        </div>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cart-footer">
            <strong>Subtotal:</strong> $<?= number_format($orderInformation['Subtotal']);?>
            <br>
            <strong>Taxes:</strong> $<?= number_format($orderInformation['Tax']);?>
            <br>
            <strong>Shipping:</strong> $<?= number_format($orderInformation['ShippingCost']);?>
            <br>
            <strong>Total:</strong> $<?= number_format($orderInformation['Total']);?>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/partials/footer.php';?>