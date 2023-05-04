<?php 
use App\models\Order;

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.header.php";
?>
<main class="index-main">
<div class="products">
    <div class="orders">
        <h1>Заказы</h1>

        <div class="form-check">
            <input value="all" id="all" class="form-check-input" type="checkbox" name="status">
            <label class="form-check-label" for="all">Все</label>
        </div>

        <?php foreach ($status as $status) : ?>
            <div class="form-check">
                <input value="<?= $status->id ?>" id="<?= $status->id ?>" class="form-check-input" type="checkbox" name="status">
                <label class="form-check-label" for="<?= $status->id ?>"><?= $status->name ?></label>
            </div>
        <?php endforeach ?>

        <p class="count-orders"></p>
    </div>
    <div>    <table class="table" width="100%" cellspacing="0" >
        <thead>
            <tr>
                <th scope="colOrd">№</th>
                <th scope="colOrd">клиент</th>
                <th scope="colOrd">статус</th>
                <th scope="colOrd">Действия</th>
                <th scope="colOrd">дата создания</th>
                <th scope="colOrd">товаров в заказе</th>
                <th scope="colOrd">стоимость</th>
            </tr>
        </thead>
    </table></div>

    <div class="container-orders">

    </div>
</div>
</div>
        </main>
<script src="/admin/assets/js/fetch.js"></script>
<script src="/admin/assets/js/loadOrders.js"></script>