<?php
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}
use App\models\Category;
use App\models\Stocks;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$categoryes = Category::allGet();
if (isset($_POST["addInsert223344"])) {
    if (isset($_FILES["image"]) && $_FILES["image"]["name"] != "") {
        $size = $_FILES["image"]["size"];
        $name = $_FILES["image"]["name"];
        $tmpname = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
        $nameInServer = time() . "_" . preg_replace("/[\-&\d_#]/", "", $name);
        if (move_uploaded_file($tmpname, $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . $nameInServer)) {
            $_SESSION["message"] = "файл успешно загружен";
            Stocks::addStock($_POST["name"], $nameInServer, $_POST["category"], $_POST["date1"], $_POST["date2"]);
            header("location: /admin/tables/admin.info.php");
        }
    } else {
        $_SESSION["errors"]["image"] = "неизвестная ошибка";
        header("location: /admin/tables/admin.add.prod.view.php");

    }

}

if (isset($_POST["BACKTOVARPROD"])) {
    header("location: /admin/tables/admin.info.php");
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.add.stock.view.php";