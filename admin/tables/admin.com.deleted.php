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

$stream = file_get_contents("php://input");
if ($stream != null) {
    $id = json_decode($stream)->id;
    $del = Comments::delComments($id);
    echo json_encode( $del, JSON_UNESCAPED_UNICODE);
}
header("location: /admin/tables/admin.com.php");