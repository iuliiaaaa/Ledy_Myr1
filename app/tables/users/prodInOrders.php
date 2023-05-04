<?php 
session_start();
use App\models\User;
use App\models\Order;
require_once $_SERVER["DOCUMENT_ROOT"].  "/bootstrap.php";

$find = Order::findOrder($_SESSION["id"]);
$prodInOrders = Order::getAllProductsByOrder($_SESSION["orId"]);
if(isset($_POST["btn_order_back"])){
    header("Location: /app/tables/users/profile.php");
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/products/prodInOrdersView.php";
