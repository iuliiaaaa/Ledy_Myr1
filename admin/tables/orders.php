<?php
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}
use App\models\Order;
// var_dump($_SESSION);

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
$res = Order::getAll();
$status = Order::getAllStatus();
json_encode($res, JSON_UNESCAPED_UNICODE);
require_once $_SERVER["DOCUMENT_ROOT"]."/admin/views/admin.orders.view.php";