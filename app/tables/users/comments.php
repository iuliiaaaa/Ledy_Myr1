<?php
session_start();
use App\models\Comments;
use App\models\User;
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$com5last = Comments::getAll();
$users = User::getAll();
if(isset($_POST["addComent"])){
    Comments::addComments($_SESSION["id"],strip_tags($_POST["comment"]),date('Y-m-d'));
    header("location: /app/tables/users/comments.php");
}
include $_SERVER["DOCUMENT_ROOT"] . "/views/products/comments.view.php";