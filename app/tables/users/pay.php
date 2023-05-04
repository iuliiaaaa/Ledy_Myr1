<?php
session_start();
use App\models\Information;
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$payInfo = Information::getPayments();
$delivery = Information::getDelivery();

include $_SERVER["DOCUMENT_ROOT"] . "/views/products/pay.view.php";