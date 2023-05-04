<?php 
session_start();
use App\models\Basket;
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$stream = file_get_contents("php://input");
if($stream!=NULL){
    $user_id = $_SESSION["id"];
    $action = json_decode($stream)->action;
    $product_id = json_decode($stream)->data;
    $product = match($action) {
        "add" => Basket::add($product_id, $user_id),
        "dash" => Basket::reducing($product_id, $user_id),
        "delete" => Basket::deletePosition($product_id, $user_id),
        'clear' => Basket::clear($user_id)
    };
    echo json_encode([
        "product" => $product,
        "allPrice" => Basket::allPrice($user_id)->sum,
        "allCount" => Basket::allCount($user_id)
    ], JSON_UNESCAPED_UNICODE);
} 



