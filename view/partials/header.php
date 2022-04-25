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
      <li class="nav-item"><a class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/aboutus')) { print('active'); } ?>" href="aboutUs.php">About</a></li>
      <li class="nav-item"><a class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/cart')) { print('active'); } ?>" href="cart.php">Cart</a></li>
      <li class="nav-item"><a class="<?php if (str_starts_with(strtolower($_SERVER['REQUEST_URI']), '/login')) { print('active'); } ?>" href="login.php">Sign in</a></li>
    </ul>
</nav>
<div class="main">
