<?php
require_once('utils/fns.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title><?= $header_name ?> - InventoMaster</title>
  <!-- <link type="image/x-icon" rel="shortcut icon" href="assets/images/favicon.png" /> -->
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="HandheldFriendly" content="true">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link href="assets/css/animate.css" rel="stylesheet">
  <!-- Custom Stylesheet -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body>
  <div class="main_wrapper">
    <!-- Header Start -->
    <div class="header_wrapper">
      <header>
        <div class="logo">
          <img src="assets/images/BoxIco.svg" alt="logo">
          <p>InventoMaster</p>
        </div>
        <div class="nav_menu">
          <ul>
            <a href="/">
              <li class="<?= uriCheck('/') ? 'nav_button_active' : 'nav_button'; ?> nav_button">
                <img src="assets/images/dashboard.svg" alt="Dashboard">
                <p>Dashboard</p>
              </li>
            </a>
            <a href="/products">
              <li class="<?= uriCheck('/products') ? 'nav_button_active' : 'nav_button'; ?> nav_button">
                <img src="assets/images/products.svg" alt="Products">
                <p>Products</p>
              </li>
            </a>
            <a href="/categories">
              <li class="<?= uriCheck('/categories') ? 'nav_button_active' : 'nav_button'; ?> nav_button">
                <img src="assets/images/category.svg" alt="Categories">
                <p>Categories</p>
              </li>
            </a>
            <a href="/orders">
              <li class="<?= uriCheck('/orders') ? 'nav_button_active' : 'nav_button'; ?> nav_button">
                <img src="assets/images/order.svg" alt="Orders">
                <p>Orders</p>
              </li>
            </a>
            <a href="#">
              <li class="nav_button">
                <img src="assets/images/report.svg" alt="Reports">
                <p>Reports</p>
              </li>
            </a>
            <a href="#">
              <li class="nav_button">
                <img src="assets/images/settings.svg" alt="Settings">
                <p>Settings</p>
              </li>
            </a>
          </ul>
        </div>
      </header>
    </div>
    <!-- Header End -->