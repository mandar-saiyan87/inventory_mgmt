<?php
$db = new Database();
$products = $db->query('select * from products')->fetchAll(PDO::FETCH_ASSOC);

$totalstock = 0;
$totalpurchase = 0;
$totalsales = 0;

foreach ($products as $product) {
  $totalstock += $product['stock'];
}

foreach ($products as $product) {
  if ($product['purchase'] == true) {
    $totalpurchase += $product['stock'];
  }
}

foreach ($products as $product) {
  if ($product['sales'] == true) {
    $totalsales += $product['stock'];
  }
}

// echoReq($totalpurchase);

$header_name = 'Dashboard';

include('views/index.views.php');
