<?php
session_start();
use App\models\Order;
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$user_id = $_SESSION["id"];
Order::create($user_id);
header("location: /");
