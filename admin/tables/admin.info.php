<?php
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}
use App\models\Stocks;
use App\models\Information;
use App\models\User;
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stocks = Stocks::getAll();
if(isset($_POST["addStock"])){
    header("location: /admin/tables/admin.add.stock.php");
}
if(isset($_POST["InsertBtn"])){
    Information::addTopicalIssues($_POST["name"],$_POST["text"]);
    header("location: /admin/tables/admin.info.php");
}
$topical = Information::getAlltopicalIssues();
if(isset($_POST["InsertBtn1"])){
    Information::redactTagline($_POST["name1"]);
    header("location: /admin/tables/admin.info.php");
}
$we_should_trust = Information::getWeShouldTrust();
$we_should_trust1 = Information::getWeShouldTrust();
if(isset($_POST["InsertBtn3"])){
    $image = Information::findWeShouldTrustImage($_POST['id']);
    if(isset($_FILES["image"]) && $_FILES["image"]["name"]!=""){
        $size = $_FILES["image"]["size"];
        $name = $_FILES["image"]["name"];
        $tmpname= $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
        $nameInServer =  time(). "_" .preg_replace("/[\-&\d_#]/","", $name);
    if(move_uploaded_file($tmpname,$_SERVER["DOCUMENT_ROOT"]. "/uploads/".$nameInServer)){
        $_SESSION["message"] = "файл успешно загружен";
        Information::addWeShouldTrustImage($_POST["we_should_trust"],$nameInServer);
        header("location: /admin/tables/admin.info.php");
    }
    else{
        $_SESSION["errors"]["image"] = "неизвестная ошибка";
        header("location: /admin/tables/admin.info.php");

    }
    if($_FILES["image"]["name"]==""){
        $nameInServer = $_POST["image"];
  
    }
    else{
        unlink($_SERVER["DOCUMENT_ROOT"]."/uploads/". $image->image);
    }
}else {
    header("location: /admin/tables/admin.info.php");
}

}
$tagline = Information::getTagline();
$contacts = Information::getPhone();
$contacts1 = Information::getMail();
$contacts2 = Information::getSocial();
if(isset($_POST["InsertBtnPhone"])){
    Information::addPhone($_POST["phone"]);
    header("location: /admin/tables/admin.info.php");
}
if(isset($_POST["InsertBtnEmail"])){
    Information::addMail($_POST["email"]);
    header("location: /admin/tables/admin.info.php");
}
if(isset($_POST["InsertBtnSocial"])){
    Information::addSocial($_POST["social"]);
    header("location: /admin/tables/admin.info.php");
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.info.view.php";
