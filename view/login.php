<?php require_once __DIR__ . '/partials/header.php'; ?>
<?php if(isset($_SESSION['type']) && $_SESSION['type']===5)
      { ?>
            <p> Registered successfully, Please log in: </p>
        <?php
      }?>
    <form action="login.php" method="post">
        <label> Login </label>
        <br>
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
    <h3>Hint:</h3>
    <p>Admin Username: admin Password: panda </p>
    <p>Regular Username: red Password: panda </p>
    <form action="register.php" method="post">
        <input type="submit" value="Register">
    </form>
<?php if (isset($error_message)): ?>
    <div class="errorMessage">
        <strong>Error:</strong>
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>
<?php require_once __DIR__ . '/partials/footer.php'; ?>