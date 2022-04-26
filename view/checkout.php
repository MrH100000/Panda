<?php require_once __DIR__ . '/partials/header.php'; ?>
    <form action="checkout.php" method="post">
    <label> Enter information: </label>
        <br>
        <label>First Name:</label>
        <input type="text" name="firstName" value="<?php echo $_SESSION["firstName"];?>" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $_SESSION["lastName"];?>" required>
        <br>
        <label>Street Adress:</label>
        <input type="text" name="street" required>
        <br>
        <label>City:</label>
        <input type="text" name="city" required>
        <br>
        <label>State:</label>
        <input type="text" name="state" required>
        <br>
        <label>Zip Code:</label>
        <input type="text" name="zipCode" required>
        <br>
        <label>Country:</label>
        <input type="text" name="country" required>
        <br>
        <label>Select Payment type:</label>
        <select name="payment">
            <option value="Credit Card"> Credit Card </option>
            <option value="Debit Card"> Debit Card </option>
            <option value="Cash Upon Delivery"> Cash upon delivery </option>
            <option value="Check Upon Delivery"> Check upon delivery </option>
            <option value="Doge Coin"> Doge Coin. </option>
        </select>
        <br>
        <input type="submit" name="submit" value="Checkout">
    </form>
<?php require_once __DIR__ . '/partials/footer.php'; ?>