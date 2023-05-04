<?php

namespace app\models;

use app\base\PDOConnection;

class Comments {
    public static function getAll(){
        $query = PDOConnection::make()->query("SELECT comments_website.id, users.login as login,users.avatar as avatar , text, date_of_creation FROM comments_website INNER JOIN users ON user_id = users.id ORDER BY comments_website.date_of_creation DESC");

        return $query->fetchAll();

    }
    public static function addComments($user, $text, $date_of_creation){
        $query = PDOConnection::make()->prepare("INSERT INTO comments_website (id, user_id, text, date_of_creation) VALUES (NULL, :user, :text, :date_of_creation);");
        $query->execute(["user" => $user, "text"=>$text, "date_of_creation" => $date_of_creation]);
        return $query->fetchAll();

    }
    public static function get5LastAll(){
        $query = PDOConnection::make()->query("SELECT comments_website.id, users.login, users.avatar, text, date_of_creation FROM comments_website INNER JOIN users ON user_id=users.id ORDER BY comments_website.date_of_creation DESC LIMIT 5");
        return $query->fetchAll();
    }
    public static function getAllLastAll(){
        $query = PDOConnection::make()->query("SELECT comments_website.id, users.name as name, text, date_of_creation FROM `comments_website` INNER JOIN users ON user_id = users.id ORDER BY comments_website.date_of_creation DESC;");
        return $query->fetchAll();
    }
    public static function delComments($id){
        $query = PDOConnection::make()->prepare("DELETE FROM comments_website WHERE comments_website.id = :id;");
        $query->execute(["id" => $id]);
        return $query->fetchAll();

    }

    
}