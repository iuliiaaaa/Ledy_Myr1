<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.header.php";
?>
<div class="Admin-container index-main">
    <div class="padding">
    <h1 class="cat">Бренды</h1>
    <form class="createBrands" action="/admin/tables/admin.brands.php" method="POST">

        <label for="name" class="name">
            Введите название:
            <input type="text" class="form-control" name="name">
        </label>

        <div class="form-group">
            <button class="button" name="InsertBtn">Добавить</button>
        </div>
    </form>
    <div class="card12">
        <ul class="list-group brand-flex">
            <?php foreach ($Brands as $item) : ?>
                <div>
                <li class="list-group-item brands-position"><?= $item->name ?> 
                <button class="del" data-id="<?= $item->id ?>">del</button></li>
                </div>
            <?php endforeach ?>
        </ul>
    </div>
    </div>
</div>
<script src="/admin/assets/js/loadBrands.js"></script>