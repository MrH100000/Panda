  <?php require_once __DIR__ . '/partials/header.php'; ?>
  <center>
      <?php if(isset($_SESSION['firstName']))
        { ?>
              <h1> Hello  <?php echo $_SESSION['firstName'] ?></h1>
          <?php
        }?>
      <h1>Welcome to MVC Panda!</h1>
  </center>
  <p>This is your one stop shop for all things panda.</p>
  <p> (if you are looking for Koala's and Koala accessories please leave, we are MVC Panda's) </p>
  <?php require_once __DIR__ . '/partials/footer.php'; ?>