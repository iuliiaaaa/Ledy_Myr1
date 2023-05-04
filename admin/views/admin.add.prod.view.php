<?php
session_start();
?>
<link rel="stylesheet" href="/admin/assets/css/add.prod.css">
<style>
</style>
<section>
    <div class="form-box">
        <div class="form-value">
            <form action="/admin/tables/admin.add.prod.php" method="post" class="form" enctype="multipart/form-data">
                <h2>Добавление товара</h2>
                <div class="input-box">
                    <ion-icon name="people-outline"></ion-icon>
                    <input required type="text" name="name" class="form-control" id="name">
                    <label for="name" class="form-label">Название</label>
                </div>
                <br>
                <p style="color:white;">Загрузить картинку</p>

                <div class="input-box">
                    <ion-icon name="people-outline"></ion-icon>
                    <input type="file" name="image" id="file" class="custom-file-input"
                        title="Изменить картинку">
                </div>
                <div class="input-box">
                    <ion-icon name="people-outline"></ion-icon>
                    <input required type="number" name="price" class="form-control" id="patronymic">
                    <label for="price" class="form-label">Цена</label>
                </div>
                <div class="input-box">
                    <ion-icon name="person-outline"></ion-icon>

                    <input required type="number" name="count" class="form-control" id="login">
                    <label for="count" class="form-label">Колличество</label>
                </div>
                <br>
                <p style="color:white;">Категории</p>
                <div class="input-box">
                    <ion-icon name="mail-outline"></ion-icon>
                    <select name="category" id="categories">
                        <?php foreach ($categoryes as $c): ?>
                            <option name="category" value="<?= $c->id ?>"><?= $c->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <br>
                <p style="color:white;">Бренды</p>
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <select name="brand" id="categories">
                        <?php foreach ($brand as $c): ?>
                            <option name="category" value="<?= $c->id ?>"><?= $c->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                    <div><button class="submit_accept" name="addInsert123">Добваить товар</button></div>
            </form>
            <div class="adr-23">
            <form action="/admin/tables/admin.add.prod.php" method="post">
            <button class="submit_accept" name="BACKTOVARPROD">Вернуться назад</button>
            </form> 
            </div>
        </div>
    </div>
</section>