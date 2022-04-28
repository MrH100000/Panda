  <?php require_once __DIR__ . '/partials/header.php'; ?>
  <center>
      <?php if(isset($_SESSION['firstName'])): ?>
              <h1>Hello <?= $_SESSION['firstName'] ?> <?= $_SESSION['lastName'] ?>!</h1>
          <?php endif; ?>
      <h1>Welcome to MVC Panda!</h1>
  </center>
  <p>This is your one stop shop for all things panda.</p>
  <p> (if you are looking for koalas and koala accessories please leave, we are MVC Pandas) </p>
  <?php require_once __DIR__ . '/partials/footer.php'; ?>