<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="panda.css">
    <title>Panda Shop</title>
</head>

<body>
<div class="page">
<nav class="navbar">
    <a href="/" class="logo">
      <img src="images/logo-rounded.png" alt="logo">
    </a>
    <ul class="nav-links">
      <li class="nav-item"><a class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/index') || $_SERVER['REQUEST_URI'] == '/') { print('active'); } ?>" href="index.php">Home</a></li>
      <li class="nav-item"><a class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/products')) { print('active'); } ?>" href="products.php">Products</a></li>
      <li class="nav-item"><a class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/about_us')) { print('active'); } ?>" href="about_us.php">About</a></li>
      <li class="nav-item"><a class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/cart')) { print('active'); } ?>" href="cart.php">Cart</a></li>
      <?php if(isset($_SESSION['loggedIn']))
      { 
      }
      else{?>
        <li class="nav-item"><a class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/login')) { print('active'); } ?>" href="login.php">Sign in</a></li>
      <?php 
      }?>
      <?php if(isset($_SESSION['type']) && $_SESSION['type']===1)
      { ?>
        <li class="nav-item"><a class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/edit_products.php')) { print('active'); } ?>" href="edit_products.php">Edit Products</a></li>
      <?php 
      }?>
    </ul>
</nav>
<div class="main">
