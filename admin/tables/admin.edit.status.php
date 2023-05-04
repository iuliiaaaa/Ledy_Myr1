<?php

use App\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}
$order_id = $_POST["btn-redacte-status"]; 
$statuses = Order::getAllStatus();
$Allorder = Order::getAll();
if(isset($_POST["btn-create-status"])){
$_SESSION["btn-create-status"] = $_POST["btn-create-status"]; 
}


require_once $_SERVER["DOCUMENT_ROOT"]."/admin/views/admin.edit.status.view.php";

