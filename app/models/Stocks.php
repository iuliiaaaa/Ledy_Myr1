<?php

namespace App\models;

use app\base\PDOConnection;

class Stocks{

    public static function getAll(){
        $query = PDOConnection::make()->query("SELECT stocks.id, stocks.name, img, categotyes_id, date_of_creation,closing_date,categoryes.name as category FROM `stocks` INNER JOIN `categoryes` ON categotyes_id = categoryes.id;");
        return $query->fetchAll();
    }
    public static function addStock($name, $image,$category,$date1,$date2){
        $query = PDOConnection::make()->prepare("INSERT INTO `stocks` (id, name, img, categotyes_id, date_of_creation, closing_date) VALUES (NULL, :name,:image ,:category ,:date1 ,:date2 );");
        $query->execute(["name" => $name,"image" => $image,"category" => $category,"date1" => $date1,"date2" => $date2]);
        return $query->fetchAll();
    }
    public static function delStock($id){
        $query = PDOConnection::make()->prepare("DELETE FROM `stocks` WHERE stocks.id = :id");
        $query->execute(["id" => $id]);
        return "delete";
    }
}