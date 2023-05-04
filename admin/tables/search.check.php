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

if ($_GET["status"] != "all") {
    $ststuses = json_decode($_GET["status"]);

    if (count($ststuses) == 0) {
        $res = Order::getAll();
    } else {
        $res = Order::getOrdersByStatuses($ststuses);
    }

    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}
