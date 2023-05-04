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
use App\models\Brand;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$products = Product::getAll();
$categoryes = Category::allGet();
$brand = Brand::allGet();
if (isset($_POST["addInsert123"])) {

    if (isset($_FILES["image"]) && $_FILES["image"]["name"] != "") {
        $size = $_FILES["image"]["size"];
        $name = $_FILES["image"]["name"];
        $tmpname = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
        $nameInServer = time() . "_" . preg_replace("/[\-&\d_#]/", "", $name);
        if (move_uploaded_file($tmpname, $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . $nameInServer)) {
            $_SESSION["message"] = "файл успешно загружен";
            Product::addProduct($_POST["name"],$nameInServer, $_POST["price"], $_POST["count"], $_POST["category"], $_POST["brand"], );
            header("location: /admin/tables/admin.product.php");
        }
    } else {
        $_SESSION["errors"]["image"] = "неизвестная ошибка";
        header("location: /admin/views/admin.add.prod.php");

    }


}
if (isset($_POST["BACKTOVARPROD"])) {
    header("location: /admin/tables/admin.product.php");
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.add.prod.view.php";