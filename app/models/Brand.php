<?php

namespace app\models;

use app\base\PDOConnection;

class Brand{

    private static function connect($config = CONFIG_CONNECTION)
    {
        return PDOConnection::make($config);
    }

    public static function allGet(){
        $query = self::connect()->query("SELECT * FROM brands");
        return $query->fetchAll();
    }
    public static function find($name)
    {
        $query = PDOConnection::make()->prepare("SELECT name FROM brands WHERE name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch();
    }
    public static function addBrands($brandsName){
        $brands = self::find($brandsName);
        if(!$brands){
            $query = PDOConnection::make()->prepare("INSERT INTO brands (name) VALUES (:brands_name)");
        $query->execute(["brands_name"=> $brandsName]);
        }
    }
    public static function deleteBrands($id){
        $query = PDOConnection::make()->prepare("DELETE FROM brands WHERE id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }

}