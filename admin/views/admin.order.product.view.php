<?php
use App\models\Order;
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/header.admin.panel.php";
?>
<main class="index-main">
<div class ="orders">
<a href="/app/admin/admin.order.php">Вернуться назад</a>
<h1>Продукты в заказе <?= $order_id ?></h1>
<h3>Пользователь: <?= Order::find($order_id)->login ?></h3>
<h3>Дата создания: <?= Order::find($order_id)->created_at ?></h3>
<table class="table">

<thead>
<tr>
<th scope="col">Продукт</th>
<th scope="col">Стоимость</th>
<th scope="col">Количество</th>
</tr>
</thead>
<tbody>
<?php foreach ($products as $res) :?>
<tr>
<td><?= $res->name ?></td>
<td><?= $res->price_product_order ?></td>
<td><?= $res->product_count ?></td>
</tr>
<?php endforeach?>
</tbody>
</table >
<table class="table">
<thead>
<thead>
<tr>
<th scope="col">Общее кол-во: <?= Order::getCountAllByOrder($order_id)->count_product_order ?> шт</th>
</tr>
<tr>
<th scope="col">Итог: <?= Order::getPriceAllByOrder($order_id)->price_product_order ?>₽</th>
</tr>
</thead>
</table >
</div>
</main>

</body>