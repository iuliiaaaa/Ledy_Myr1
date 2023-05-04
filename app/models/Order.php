<?php

namespace App\models;

use App\base\PDOConnection;
use App\models\Basket;
use App\models\Products;

class Order
{

    public static function create($user_id)
    {
        $basket = Basket::all($user_id);
        $conn = PDOConnection::make();
        try {
            $conn->beginTransaction();
            $order_id = self::addOrder($user_id, $conn);
            self::addProductsOrder($basket, $order_id, $conn);
            Product::updateCount($basket, $conn);
            Basket::clear($user_id, $conn);
            $conn->commit();
        } catch (\PDOException $error) {
            $conn->rollBack();
            echo ("ошибка " . $error->getMessage());
        }
    }

    public static function addOrder($user_id, $conn)
    {
        $query =  $conn->prepare('INSERT INTO orders (id, date, user_id, status_id, delivery_id) VALUES (NULL, :date, :user_id, 2, 2)');
        $query->execute(['user_id' => $user_id, 'date' => date('Y-m-d') ]);
        return $conn->lastInsertId();
    }
    private static function getParam($array, $value)
    {
        return implode(",", array_fill(0, count($array), $value));
    }

    public static function addProductsOrder($basket, $order_id, $conn)
    {
        //передаем строке неизменную часть запроса
        $base = "INSERT INTO products_in_orders (order_id, product_id, count) VALUES ";

        //формируем количество позиционных параметров в зависимости от кол-ва продуктов
        $params = self::getParam($basket, "(?, ?, ?)");

        //создали текст запроса, соединили 2 части
        $queryText = $base . $params;

        $values = [];

        //заполняем массив с значениями 
        foreach ($basket as $item) {
            $values[] = $order_id;
            $values[] = $item->product_id;
            $values[] = $item->count;
        }

        $query = $conn->prepare($queryText);

        $query->execute($values);
    }
    public static function getAll(){
        $query = PDOConnection::make()->query("SELECT orders.id as id, date, user_id, statuses.name as status, delivery.point_of_issue as delivery FROM `orders` INNER JOIN `statuses` ON status_id = statuses.id INNER JOIN `delivery` ON delivery_id = delivery.id;");
        return $query->fetchAll();
    }
    public static function getAllview(){
        $query = PDOConnection::make()->query("SELECT orders.id as order_id, users.login as login, statuses.name as status, orders.date as date,(SELECT SUM( count) FROM products_in_orders WHERE products_in_orders.order_id = orders.id) as count, (SELECT SUM(products_in_orders.count * products.price) as price_product_order FROM products_in_orders INNER JOIN products ON product_id = products.id WHERE order_id = orders.id) as price FROM orders INNER JOIN statuses ON orders.status_id = statuses.id INNER JOIN users ON orders.user_id = users.id");
        return $query->fetchAll();
    }
    public static function getAllStatus(){
        $query = PDOConnection::make()->query("SELECT * FROM `statuses`");
        return $query->fetchAll();

    }
    public static function getCountAllByOrder($order_id){
        $query = PDOConnection::make()->prepare("SELECT SUM(products_in_orders.count) as count_product_order FROM products_in_orders WHERE order_id = ? ");

        $query->execute([$order_id]);

        return $query->fetch();
        
    }

    public static function editStatus($status,$order_id){
        $query = PDOConnection::make()->prepare("UPDATE orders SET status_id = :status WHERE orders.id = :id");
        $query->execute(["status" => $status, "id" => $order_id]); 
    }

    public static function getAllProductsByOrder($order_id){
        $query = PDOConnection::make()->prepare("SELECT products.name as name_prod, (products.price * products_in_orders.count) as price_product_order, products_in_orders.count as product_count FROM products_in_orders INNER JOIN products ON products.id = products_in_orders.product_id WHERE order_id = ?");

        $query->execute([$order_id]);

        return $query->fetchAll();
    }
    public static function getPriceAllByOrder($order_id){
        $query = PDOConnection::make()->prepare("SELECT SUM(products_in_orders.count * products.price) as price_product_order FROM products_in_orders INNER JOIN products ON product_id = products.id WHERE order_id = ? ");

        $query->execute([$order_id]);

        return $query->fetch();
        
    }
    public static function findOrder($id){
        $query = PDOConnection::make()->prepare("SELECT id FROM `orders` WHERE user_id = :id");

        $query->execute(["id"=>$id]);

        return $query->fetch();
        
    }
    private static function getParameters($array){
        return implode(",", array_fill(0, count($array), "?"));
    }
          public static function getOrdersByStatuses($arr){
            $parameter = self::getParameters($arr);
    
            $query = PDOConnection::make()->prepare("SELECT orders.id as order_id, users.login, statuses.name as status, orders.date,(SELECT SUM( count) FROM products_in_orders WHERE products_in_orders.order_id = orders.id) as count, (SELECT SUM(products_in_orders.count * products.price) as price_product_order FROM products_in_orders INNER JOIN products ON product_id = products.id WHERE order_id = orders.id) as price FROM orders INNER JOIN statuses ON orders.status_id = statuses.id INNER JOIN users ON orders.user_id = users.id WHERE orders.status_id in (". $parameter .");");
    
            $query->execute($arr);
    
            return  $query->fetchAll();
        }
}
