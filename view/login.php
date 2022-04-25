<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- TODO: Create login form here -->

<?php if (isset($error_message)): ?>
    <div class="errorMessage">
        <strong>Error:</strong>
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>
<?php require_once __DIR__ . '/partials/footer.php'; ?>