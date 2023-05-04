<?php
session_start();
use App\models\User;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

unset($_SESSION["errors"]);

$names = [];
$surnames = [];
$patronymics = [];
$logins = [];
$emails = [];
if (isset($_POST['btn'])) {
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["patronymic"] = $_POST["patronymic"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["login"] = $_POST["login"];
// проверка имени
    if (empty($_POST["name"])) {
        $_SESSION["errors"]["name"] = "имя пустое";
    } elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["name"], $names)) {
        $_SESSION["errors"]["name"] = "некорректное имя";
    } else $_SESSION["name"] = $names[0];
// провверка фамилии
    if (empty($_POST["surname"])) {
        $_SESSION["errors"]["surname"] = "фамилия пустое";
    } elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["surname"], $surnames)) {
        $_SESSION["errors"]["surname"] = "некорректное имя";
    } else $_SESSION["surname"] = $surnames[0];
//  проверка отчества
    if (!preg_match("/^[А-ЯЁа-яё][а-яё]*$/u", $_POST["patronymic"], $patronymics)) {
        $_SESSION["errors"]["patronymic"] = "некорректное отчество";
    } else $_SESSION["patronymic"] = $patronymics[0];
// проверка почты
    if (empty($_POST["email"])) {
        $_SESSION["errors"]["email"] = "заполните почту";
    } elseif(User::findEmail($_POST["email"])){
        $_SESSION["errors"]["email"] = "почта занята";
    }
    elseif (!preg_match("/([A-Za-z0-9]+@[a-z]+\.[a-z]+)/u", $_POST["email"], $emails)) {
        $_SESSION["errors"]["email"] = "некорректная почта";
    } else $_SESSION["email"] = $emails[0];
    //проверка логина
    if (empty($_POST["login"])) {
        $_SESSION["errors"]["login"] = "введите логин";
    } elseif(User::findLogin($_POST["login"])){
        $_SESSION["errors"]["login"] = "данный логин уже занят";
    }
    elseif (!preg_match("/^[A-Za-z0-9]+$/u", $_POST["login"], $logins)) {
        $_SESSION["errors"]["login"] = "некорректный логин";
    } else $_SESSION["login"] = $logins[0];
    //проверка паролей
    if (empty($_POST["password"]) || empty($_POST["password_confirmation"])) {
        $_SESSION["errors"]["password"] = "заполните пароль";
    } elseif ($_POST["password"] != $_POST["password_confirmation"]) {
        $_SESSION["errors"]["password"] = "пароли не совпадают";
    }
    if (empty($_SESSION["errors"])) {
        if (User::dataBaseInPhp($_POST)) {
            $user = User::addUser($_POST['login'], $_POST['password']);
            $_SESSION["avtorisation"] = true;
            $_SESSION["id"] = $user->id;
            $_SESSION["login"] = $_POST["login"];
            header("Location: /app/tables/users/auth.php");
            die();
        } else {
            header("Location: /app/tables/users/reg.php");
            die();
        }
    } else { 
        header("Location: /app/tables/users/reg.php");
        $_SESSION['errors']["res"] = "Имеются ошибки ввода";}
}
