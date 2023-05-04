<?php
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}
use App\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (isset($_POST["btn-create-status"])) {
    if ($_POST["status"] == 3) {
        if (preg_match("/^(?=.{10,})(?=(.*[^а-яёА-ЯЁ])).*$/u", $_POST["message"])) {
            Order::editStatus($_POST["status"],$_POST["btn-create-status"]);
            header("location: /admin/views/admin.order.view.php");
        }else{
            $_SESSION["error"] = "Ошибка";
            header("location: /admin/tables/admin.edit.status.php");
        }
    } else {
        Order::editStatus($_POST["status"],$_POST["btn-create-status"]);
        header("location: /admin/views/admin.order.view.php");
}

}

$status = Order::getAllStatus();


require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.order.view.php";
