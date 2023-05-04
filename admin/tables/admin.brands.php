<?php

use App\models\Brand;
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(isset($_POST["InsertBtn"])){
    Brand::addBrands($_POST["name"]);
    header("location: /admin/tables/admin.brands.php");
}
$Brands = Brand::allGet();
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/views/admin.bands.edit.php';

