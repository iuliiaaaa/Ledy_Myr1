<?php
session_start();
use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$products = Product::getAll();

include $_SERVER["DOCUMENT_ROOT"] . "/views/products/catalog.view.php";
