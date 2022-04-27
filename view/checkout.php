<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="cart-area">
    <div class="card small">
        <h1>Checkout</h1>
        <form action="checkout.php" method="post">
            <div class="form-fieldgroup">
                <label>First Name:</label>
                <input type="text" name="firstName" value="<?php echo $_SESSION["firstName"];?>" required>
            </div>
            <div class="form-fieldgroup">
                <label>Last Name:</label>
                <input type="text" name="lastName" value="<?php echo $_SESSION["lastName"];?>" required>
            </div>
            <div class="form-fieldgroup">
                <label>Street Address:</label>
                <input type="text" name="street" required>
            </div>
            <div class="form-fieldgroup">
                <label>City:</label>
                <input type="text" name="city" required>
            </div>
            <div class="form-fieldgroup">
                <label>State:</label>
                <input type="text" name="state" required>
            </div>
            <div class="form-fieldgroup">
                <label>Zip Code:</label>
                <input type="text" name="zipCode" required>
            </div>
            <div class="form-fieldgroup">
                <label>Country:</label>
                <input type="text" name="country" required>
            </div>
            <div class="form-fieldgroup">
                <label>Select Payment type:</label>
                <select name="payment">
                    <option value="Credit Card"> Credit Card </option>
                    <option value="Debit Card"> Debit Card </option>
                    <option value="Cash Upon Delivery"> Cash upon delivery </option>
                    <option value="Check Upon Delivery"> Check upon delivery </option>
                    <option value="Doge Coin"> Doge Coin. </option>
                </select>
            </div>
            <hr/>
            <p>
                <strong>Subtotal:</strong> $<?php echo number_format($subtotal);?>
                <br>
                <strong>Taxes:</strong> 10%
                <br>
                <strong>Total:</strong> $<?php echo number_format($total);?>
            </p>
            <hr/>
            <input class="button" type="submit" value="Checkout">
        </form>
    </div>
</div>
<?php require_once __DIR__ . '/partials/footer.php'; ?>