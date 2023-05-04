<?php
session_start();
use App\models\Basket;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$user_id = $_SESSION["id"];
$productsInBasket = Basket::all($user_id);
$delivery =Basket::getAllDelivery();
$totalSum = Basket::allPrice($user_id);
$totalCount = Basket::allCount($user_id);
include $_SERVER["DOCUMENT_ROOT"] . "/views/products/basket.view.php";
