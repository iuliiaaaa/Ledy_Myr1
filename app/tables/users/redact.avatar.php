<?php 
session_start();
use App\models\User;
require_once $_SERVER["DOCUMENT_ROOT"].  "/bootstrap.php";
$image = User::findAvatar($_SESSION['id']);
json_encode($res, JSON_UNESCAPED_UNICODE);
if(isset($_POST["img"])){
    if(isset($_FILES["image"]) && $_FILES["image"]["name"]!=""){
        $size = $_FILES["image"]["size"];
        $name = $_FILES["image"]["name"];
        $tmpname= $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
        $nameInServer =  time(). "_" .preg_replace("/[\-&\d_#]/","", $name);
    if(move_uploaded_file($tmpname,$_SERVER["DOCUMENT_ROOT"]. "/uploads/".$nameInServer)){
        $_SESSION["message"] = "файл успешно загружен";
        User::reAvatar($nameInServer, $_SESSION["id"]);
        header("location: /app/tables/users/profile.php");
    }
    else{
        $_SESSION["errors"]["image"] = "неизвестная ошибка";
        header("location: /app/tables/users/profile.php");

    }
    if($_FILES["image"]["name"]==""){
        $nameInServer = $_POST["image"];
  
    }
    else{
        unlink($_SERVER["DOCUMENT_ROOT"]."/uploads/". $image->avatar);
    }
}else {
    header("location: /app/tables/users/profile.php");
}

}


