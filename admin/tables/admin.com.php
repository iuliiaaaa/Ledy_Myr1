<?php
session_start();
if($_SESSION["role"][0]->role == "Администратор"){
    // header("Location: /admin/tables/admin.info.php");
}
else{
    header("Location: /");
}
use App\models\Comments;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


$com = Comments::getAllLastAll();
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/views/admin.coms.view.php';

