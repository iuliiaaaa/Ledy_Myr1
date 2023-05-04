<?php 
session_start();
use App\models\User;
use App\models\Order;
require_once $_SERVER["DOCUMENT_ROOT"].  "/bootstrap.php";
$users = User::getAll();
$users1 = User::getAll();
$res = Order::getAll();
$res1 = Order::getAll();
$image = User::findAvatar($_SESSION['id']);
json_encode($res, JSON_UNESCAPED_UNICODE);
if(isset($_POST["order_id"])){
    header("Location: /app/tables/users/prodInOrders.php");
    $_SESSION["orId"] = $_POST["orId"];
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/products/profile.view.php";

