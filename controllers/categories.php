<?php
$db = new Database();
$products = $db->query('select * from products')->fetchAll(PDO::FETCH_ASSOC);

$categories = [];
foreach ($products as $product) {
  array_push($categories, $product['category']);
}

$unique_category = array_unique($categories);


$header_name = 'Categories';
include('views/categories.view.php');
