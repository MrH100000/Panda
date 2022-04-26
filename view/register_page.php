<?php require_once __DIR__ . '/partials/header.php'; ?>

    <form action="register.php" method="post">
        <label> Enter information: </label>
        <br>
        <label>First Name:</label>
        <input type="text" name="firstName" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="lastName" required>
        <br>
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="register">
    </form>
<?php if (isset($error_message)): ?>
    <div class="errorMessage">
        <strong>Error:</strong>
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>
<?php require_once __DIR__ . '/partials/footer.php'; ?>