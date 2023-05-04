<?php

namespace App\models;

use App\base\PDOConnection;

class User {
    public static function addUser($login, $password)
    {
        $query = PDOConnection::make()->prepare("SELECT * FROM users WHERE users.login = :login");
        $query->execute([':login' => $login]);
        $user = $query->fetch();
        if ($password == $user->password ) {
            return $user;
        } else return null;
    }
    public static function findEmail($email)
    {
        $query = PDOConnection::make()->prepare("SELECT users.id ,users.name, login, users.email, role_id FROM users WHERE users.email = ?");
        $query->execute([$email]);
        $res = $query->fetchAll();
        return !empty($res);
    }
    public static function findUsers($id)
    {
        $query = PDOConnection::make()->prepare("SELECT users.id ,users.name, users.surname, users.email, users.login FROM users WHERE users.id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }
    public static function findAvatar($avatar)
    {
        $query = PDOConnection::make()->prepare("SELECT users.avatar, users.id FROM users WHERE users.id = ?");
        $query->execute([$avatar]);
        return $query->fetch();
    }
    
    public static function reAvatar($avatar, $id)
    {
        $query = PDOConnection::make()->prepare("UPDATE users SET avatar = :avatar WHERE users.id = :id");
        $query->execute(["avatar" => $avatar, "id" => $id]);
        return $query->fetch();
    }

    public static function dataBaseInPhp($data)
    {
        $create = PDOConnection::make()->prepare("INSERT into users (name, surname, patronymic, login, email, password, avatar, role_id) values (:name, :surname,  :patronymic, :login, :email, :password, :avatar, :role_id)");
        return $create->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "patronymic" => $data["patronymic"],
            "login" => $data["login"],
            "email" => $data["email"],
            "password" => $data["password"],
            "avatar" => $data["avatar"],
            "role_id" => $data["role_id"] = 1
        ]);
    }
    // есть ли такой логин
    public static function findLogin($login)
    {
        $query = PDOConnection::make()->prepare("SELECT users.id ,users.name, login, users.email, role_id FROM users WHERE users.login = ?");
        $query->execute([$login]);
        $res = $query->fetchAll();
        return !empty($res);
    }
    public static function getAll(){
        $query = PDOConnection::make()->query("SELECT users.id,users.name, patronymic, surname, login, email, password, avatar, roles.name as 'role' FROM `users` INNER JOIN `roles` on role_id = roles.id;");
        return $query->fetchAll();
    }
    public static function getRole($id){
        $query = PDOConnection::make()->prepare("SELECT roles.name as role FROM `users` INNER JOIN roles ON role_id = roles.id WHERE users.id = :id");
        $query->execute(['id'=>$id]);
        return $query->fetchAll();
    }
}
