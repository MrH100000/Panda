<?php require_once __DIR__ . '/partials/header.php'; ?>
<?php if(isset($_SESSION['type']) && $_SESSION['type']===5): ?>
    <p> Registered successfully, Please log in: </p>
<?php endif; ?>

<div class="login-area">
    <div class="login-card">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="login-fieldgroup">
                <label class="login-label" for="username_field">Username:</label>
                <input class="login-textfield" type="text" name="username" id="username_field" required>
            </div>
            <div class="login-fieldgroup">
                <label class="login-label" for="password_field">Password:</label>
                <input class="login-textfield" type="password" name="password" id="password_field" required>
            </div>
            <br>
            <input class="login-button" type="submit" value="Login">
        </form>
        <hr/>
        <h3>Hint:</h3>
        <p>
            <strong>Admin:</strong>
            <br>
            Username: admin
            <br>
            Password: panda
        </p>
        <p>
            <strong>User:</strong>
            <br>
            Username: red
            <br>
            Password: panda
        </p>
        <form action="register.php" method="post">
            <input class="login-button" type="submit" value="Register">
        </form>
    </div>
</div>






<?php if (isset($error_message)): ?>
    <div class="errorMessage">
        <strong>Error:</strong>
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>
<?php require_once __DIR__ . '/partials/footer.php'; ?>