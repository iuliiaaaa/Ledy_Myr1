<?php
session_start();
use App\models\Category;
use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$products = Product::getAll();
$categoryes = Category::allGet();
include $_SERVER["DOCUMENT_ROOT"] . "/views/products/catalog.view.php";
