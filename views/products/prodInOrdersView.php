<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';
?>
<title>Продукты в корзине</title>
<main class="index-main">
<div class="container-div-main">
    <form action="/app/tables/users/prodInOrders.php" method="post">
    <button class="btn btn-order-profile-back btn-to-basket" name="btn_order_back">Вернуться обратно</button>
    </form>
    <hr>
<table class="table">
<thead>
<tr class="order_stut">
                <th scope="col">Название</th>
                <th scope="col">Колличество</th>
                <th scope="col">Цена</th>
</tr>
</thead>
<tbody>
<?php foreach ($prodInOrders as $prodInOrders): ?>
            <tr class="order_stut">
                <td><?= $prodInOrders->name_prod ?></td>
                <td><?= $prodInOrders->product_count ?></td>
                <td><?= $prodInOrders->price_product_order ?></td>
            </tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</main>