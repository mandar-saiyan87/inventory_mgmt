<?php

$db = new Database();
$products = $db->query('select * from products')->fetchAll(PDO::FETCH_ASSOC);

$categories = [];
foreach ($products as $product) {
  array_push($categories, $product['category']);
}

$unique_category = array_unique($categories);

if ($_POST['prodId']) {
  extract($_POST);
  try {
    $prodDetails = $db->query("select * from products where id=$prodId")->fetch(PDO::FETCH_ASSOC);
    echoReq($prodDetails);
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}


$header_name = 'Products';

include('views/products.view.php');
