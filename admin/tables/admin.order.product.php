<?php

use App\models\Order;
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$order_id = $_POST["btn-show-products"];
$products = Order::getAllProductsByOrder($order_id);
// var_dump($products);
require_once $_SERVER["DOCUMENT_ROOT"]."/app/admin/admin.order.product.view.php";