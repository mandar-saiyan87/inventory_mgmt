<?php

$db = new Database();
$purchase = $db->query('select * from products where purchase = true')->fetchAll(PDO::FETCH_ASSOC);
$sales = $db->query('select * from products where sales = true')->fetchAll(PDO::FETCH_ASSOC);

// echoReq($purchase);

$header_name = 'Orders';
include('views/orders.view.php');
