<?php 
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
use App\models\User;
if(isset($_POST["btnAc"])){
    $user = User::addUser($_POST['login'],$_POST['password']);
    $_SESSION['role'] = User::getRole($user->id);
    if($_SESSION['role'][0]->role=="Администратор"){
        header("Location: /admin/tables/admin.info.php");
    }
    else {
        header("Location: /");
    }

}
if(isset($_POST["exitAdmin"])){
    session_destroy();
    header("Location: /");
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.auth.view.php";
