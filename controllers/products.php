<?php

$db = new Database();
$products = $db->query('select * from products')->fetchAll(PDO::FETCH_ASSOC);

$categories = [];
foreach ($products as $product) {
  array_push($categories, $product['category']);
}

// Unique values from array
$unique_category = array_unique($categories);

// Add New Product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // echoReq($_POST);
  if (isset($_POST['addnew'])) {
    extract($_POST);
    try {
      $addnew = $db->query("insert into products (`sku`, `name`, `description`, `stock`, `purchase`, `sales`, `qty`, `price`, `category`) values ('$sku','$name','$description','$stock','$purchase','$sales','$qty','$price','$category')");

      if ($addnew) {
        header('LOCATION: products');
        die();
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

// Edit existing products
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['editproduct'])) {
    $id = $_GET['id'];
    extract($_POST);
    try {
      $addnew = $db->query("update products set sku='$editsku', name='$editname', description='$editdescription', stock='$editstock', purchase='$editpurchase', sales='$editsales', qty='$editqty', price='$editprice', category='$editcategory' where id=$id");

      if ($addnew) {
        header('LOCATION: products');
        die();
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

// Delete Product
if (isset($_GET['delid'])) {
  // echoReq($_GET);
  extract($_GET);
  try {
    $delProd = $db->query("delete from products where id=$delid");
    if ($delProd) {
      header('LOCATION: products');
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

// Get details to show product details
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'getDetails') {
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

// Get existing details to edit in modal
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'editDetails') {
  extract($_POST);
  try {
    $prodDetails = $db->query("select * from products where id=$prodId")->fetch(PDO::FETCH_ASSOC);
    // echoReq($prodDetails);
    echo json_encode($prodDetails);
    die();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}


$header_name = 'Products';
include('views/products.view.php');
