<?php

use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if ($_GET["category"] != "all") {
    $categoryes = json_decode($_GET["category"]);

    if (count($categoryes) == 0) {
        $res = Product::getAll();
    } else {
        $res = Product::getProductsByCategories($categoryes);
        // var_dump($categoryes);
    }

    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}