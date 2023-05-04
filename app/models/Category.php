<?php

namespace App\models;

use app\base\PDOConnection;

class Category {

    private static function connect($config = CONFIG_CONNECTION)
    {
        return PDOConnection::make($config);
    }

    public static function allGet(){
        $query = self::connect()->query("SELECT name, id FROM categoryes");
        return $query->fetchAll();
    }
    public static function find($name)
    {
        $query = PDOConnection::make()->prepare("SELECT name FROM categoryes WHERE name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch();
    }
    public static function addCategory($categoryName){
        $category = self::find($categoryName);
        if(!$category){
            $query = PDOConnection::make()->prepare("INSERT INTO categoryes (name) VALUES (:category_name)");
        $query->execute(["category_name"=> $categoryName]);
        }
    }
    public static function deleteCategory($id){
        $query = PDOConnection::make()->prepare("DELETE FROM categoryes WHERE id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }
   

}
