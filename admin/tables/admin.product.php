<?php
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}
use App\models\Category;
use App\models\Product;


include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$products = Product::getAll();
$categoryes = Category::allGet();

if(isset($_POST["addProd"])){
    header("location: /admin/tables/admin.add.prod.php");
}
include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.product.view.php";
