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
    // echoReq($prodDetails);
    echo
    "
       <div class='modal-header'>
          <h1 class='modal-title fs-5' id='exampleModalLabel'>{$prodDetails['sku']}</h1>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
          <div>
            <p style='margin: 1rem 0;'>Prduct Name:<br> <span style='font-weight: 600'>{$prodDetails['name']}</span></p>
            <p style='margin: 1rem 0;'>Prduct Category:<br><span style='font-weight: 600'>{$prodDetails['category']}</span></p>
            <p style='margin: 1rem 0;'>Prduct Details:<br><span style='font-weight: 600'>{$prodDetails['description']}</span></p>
            <p style='margin: 1rem 0;'>Prduct Stock: <span style='font-weight: 600'>{$prodDetails['stock']}</span></p>
            <p style='margin: 1rem 0;'>Prduct Price: <span style='font-weight: 600'>{$prodDetails['price']}</span></p>
          </div>
        </div>
      ";
    die();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

$header_name = 'Products';
include('views/products.view.php');
