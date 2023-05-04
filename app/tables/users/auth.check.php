<?php
session_start();

use App\models\User;
unset($_SESSION["error"]);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$_SESSION["login"] = $_POST["login"];
if(isset($_POST["btn"])){
    $user = User::addUser($_POST['login'],$_POST['password']);
    if($user == null){
        $_SESSION["error"] = "Имя или пароль не верны";
        $_SESSION["avtorisation"] = false;
        if(!User::findLogin($_POST['login'])) {
            $_SESSION["error"] = "такого аккаунта не существует";
        }
        header("Location: /app/tables/users/auth.php");
        die();
        }else{
            $_SESSION["avtorisation"] = true;
            $_SESSION["id"] = $user->id;
            header("Location: /");
    }

}
