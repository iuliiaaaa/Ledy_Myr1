<?php

namespace app\models;

use app\base\PDOConnection;

class Basket
{

    private static function connect($config = CONFIG_CONNECTION)
    {
        return PDOConnection::make($config);
    }

    // ищем товар в корзине
    public static function search($product_id, $user_id)
    {
        $query = self::connect()->prepare("SELECT * FROM baskets WHERE product_id = :product_id AND user_id =:user_id");
        $query->execute([
            ":product_id" => $product_id,
            ":user_id" => $user_id
        ]);
        return $query->fetch();
    }

    // добавление позиции в корзину
    public static function add($product_id, $user_id)
    {
        // поищем товар в корзине пользователя
        $productInBasket = self::search($product_id, $user_id);

        // ищем аналогичный товар наскладе
        $query = self::connect()->prepare("SELECT * FROM products WHERE id =:product_id");
        $query->execute(["product_id" => $product_id]);
        $product = $query->fetch();

        // если товара нет в корзие то мы его добавим в корзину в кол =1 иначе
        if (!$productInBasket) {
            $query = self::connect()->prepare("INSERT INTO baskets ( user_id, product_id, count) VALUES ( :user_id, :product_id, 1)");
            $query->execute(["user_id" => $user_id, "product_id" => $product_id]);
        }
        // если колличество товаров в корзине не больше того что имеется на складе то увеличиваем ее на 1
        else {
            if ($productInBasket->count < $product->count) {
                // 1 способ
                $query = self::connect()->prepare("UPDATE baskets SET count=:count WHERE product_id=:product_id AND user_id=:user_id");
                $query->execute([
                    "count" => $productInBasket->count + 1,
                    "product_id" => $product_id,
                    "user_id" => $user_id
                ]);

                // 2 способ
                // $query = self::connect()->prepare("UPDATE baskets SET count=count+1 WHERE product_id=:product_id AND user_id=:user_id");
                // $query->execute([
                //     "product_id"=>$product_id,
                //     "user_id"=>$user_id,
                // ]);
                // if($product->count>$productInBasket->count){
                //     $query = self::connect()->prepare("UPDATE baskets SET count=count-1 WHERE product_id=:product_id AND user_id=:user_id");
                //     $query->execute([
                //         "product_id"=>$product_id,
                //         "user_id"=>$user_id,
                //     ]); 
                // }
            }
            return self::search($product_id, $user_id);
        }
    }
    public static function all($user_id)
    {
        $query = self::connect()->prepare("SELECT baskets.*, products.name as product_name, products.img, products.price as price from baskets INNER JOIN products on product_id=products.id WHERE baskets.user_id = :user_id");
        $query->execute([
            "user_id" => $user_id,
        ]);
        return $query->fetchAll();
    }
    // уменьшаем товар на 1
    public static function reducing($product_id, $user_id)
    {
        $productInBasket = self::search($product_id, $user_id);
        if ($productInBasket->count > 1) {
            $query = PDOConnection::make()->prepare("UPDATE baskets SET count = count-1 WHERE user_id = :user_id AND product_id = :product_id ");
            $query->execute([
                "user_id" => $user_id,
                "product_id" => $product_id
            ]);
        }
        return self::search($product_id, $user_id);
    }
    // удаление товара
    public static function deletePosition($product_id, $user_id)
    {
        $query = PDOConnection::make()->prepare("DELETE FROM `baskets` WHERE user_id = :user_id AND product_id = :product_id ");
        $query->execute([
            "user_id" => $user_id,
            "product_id" => $product_id
        ]);
        return "delete";
    }
    //стоимость корзины пользователя
    public static function allPrice($user_id)
    {
        $query = PDOConnection::make()->prepare("SELECT SUM(products.price * baskets.count) as sum FROM baskets INNER JOIN products ON product_id = products.id WHERE user_id = :user_id  ");
        $query->execute([
            "user_id" => $user_id,
        ]);
        return $query->fetch();
    }
    //колл предметов у пользователя
    public static function allCount($user_id)
    {
        $query = PDOConnection::make()->prepare("SELECT SUM(baskets.count) as sum FROM baskets WHERE user_id = :user_id");
        $query->execute([
            "user_id" => $user_id,
        ]);
        return $query->fetch();
    }
        //очистка корзины
    public static function clear($user_id, $conn = null)
    { 
        $conn = $conn??PDOConnection::make();
        $query = $conn->prepare("DELETE FROM `baskets` WHERE user_id = :user_id ");
        $query->execute([
            "user_id" => $user_id,
        ]);
        return "Корзина пустая";
    }
    public static function getAllDelivery(){
        $query = PDOConnection::make()->query("SELECT * FROM `delivery`");
        return $query->fetchAll();
    }
}
