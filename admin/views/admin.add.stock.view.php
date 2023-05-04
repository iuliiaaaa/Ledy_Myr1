<?php
session_start();
?>
<link rel="stylesheet" href="/admin/assets/css/add.prod.css">
<style>
</style>
<section>
    <div class="form-box">
        <div class="form-value">
            <form action="/admin/tables/admin.add.stock.php" method="post" class="form"  enctype="multipart/form-data">
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
                    <input type="file" name="image" required id="file" class="custom-file-input"
                        title="Изменить картинку">
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
                <div class="input-box">
                    <ion-icon name="people-outline"></ion-icon>
                    <input required type="date" name="date1" class="form-control" id="name" style="opacity:40%;">
                    <label for="date1" class="form-label">Дата начала</label>
                </div>
                <div class="input-box">
                    <ion-icon name="people-outline"></ion-icon>
                    <input required type="date" name="date2" class="form-control" id="name" style="opacity:40%;">
                    <label for="date2" class="form-label">Дата конца</label>
                </div>
                    <div><button class="submit_accept" name="addInsert223344">Добваить акцию</button></div>
            </form>
            <div class="adr-23">
            <form action="/admin/tables/admin.info.php" method="post">
            <button class="submit_accept" name="BACKTOVARPROD">Вернуться назад</button>
            </form> 
            </div>
        </div>
    </div>
</section>