<?php
namespace App\models;
use App\base\PDOConnection;

class Product{

    //получаем все товары в наличии 
    public static function getAll(){
        $query = PDOConnection::make()->query("SELECT products.id as product_id, products.name as product_name, img, price, count, category_id, categoryes.name as category, brands.name as brand FROM `products` INNER JOIN `brands` ON products.brands_id = brands.id INNER JOIN `categoryes` ON products.category_id = categoryes.id");

        return $query->fetchAll();

    }

    //ищем товар по id
    public static function find($id){
        $query = PDOConnection::make()->prepare("SELECT products.id as product_id, products.name as product_name, price, count, img, categoryes.name as category FROM products INNER JOIN categoryes ON products.category_id = categoryes.id WHERE products.id = :id");

        $query->execute(["id" =>$id]);

        return $query->fetch();

    }

    //получаем последнии 5 товаров
    public static function get5LastProducts(){
        $query = PDOConnection::make()->query("SELECT products.id as product_id, products.name as product_name, price, count, release_year, color, image, countries.name as country, categories.name as category, created_at, updated_at FROM products INNER JOIN countries ON products.country_id = countries.id INNER JOIN categories ON products.category_id = categories.id WHERE products.count > 0 ORDER BY created_at DESC LIMIT 5");

        return $query->fetchAll();

    }

    //Получаем ппродукты по одной категории
    public static function productsByCategory($id){

        $query = PDOConnection::make()->prepare("SELECT products.id as product_id, products.name as product_name, price, count, img categoryes.name as category FROM products INNER JOIN categoryes ON products.category_id = categoryes.id WHERE products.count > 0 AND products.category_id = ?");

        $query->execute([$id]);

        return $query->fetchAll();

    }

    //формируем строку с позиционными параметрами
    private static function getParameter($array){
        return implode(",", array_fill(0, count($array), "?"));
    }

    //получаем товары по нескольким указанным категориям
    public static function getProductsByCategories($categoryes){
        //формируем параметр запроса
        $parameter = self::getParameter($categoryes);

        $query = PDOConnection::make()->prepare("SELECT products.id as product_id, products.name as product_name, price, count, img, categoryes.name as category, brands.name as brand FROM products INNER JOIN `brands` ON products.brands_id = brands.id INNER JOIN categoryes ON products.category_id = categoryes.id WHERE category_id in (". $parameter .") AND products.count > 0");

        $query->execute($categoryes);

        return $query->fetchAll();
    }

    //заложить изменение кол-ва товара на складе
    public static function updateCount($basket, $conn = NULL){
        $conn = $conn??PDOConnection::make();

        $query = $conn->prepare("UPDATE products SET count = count - :count WHERE id = :product_id");

        

        foreach($basket as $item){
           $query->bindValue('count', $item->count, \PDO::PARAM_INT);
           $query->bindValue('product_id', $item->product_id, \PDO::PARAM_INT);
           $query->execute();
        }

        
    }
    public static function delProduct($id){
        $query = PDOConnection::make()->prepare("DELETE FROM `products` WHERE products.id = :id;");
        $query->execute(["id" => $id]);
        return "delete";
    }
    public static function addProduct($name,$img,$price,$count,$category,$brands){
        $query = PDOConnection::make()->prepare("INSERT INTO `products` (id, name, img, price, count, category_id, brands_id) VALUES (NULL, :name, :img, :price, :count, :category, :brands);");
        $query->execute(["name" => $name,"img" => $img,"price" => $price,"count" => $count,"category" => $category,"brands" => $brands]);
        return $query->fetchAll();
    }
}