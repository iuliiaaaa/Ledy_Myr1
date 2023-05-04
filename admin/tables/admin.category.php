<?php
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}
use App\models\Category;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(isset($_POST["InsertBtn"])){
    Category::addCategory($_POST["name"]);
    header("location: /admin/tables/admin.category.php");
}
$categories = Category::allGet();
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/views/admin.category.view.php';

