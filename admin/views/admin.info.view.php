<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.header.php";
?>
<div class="Admin-container index-main">
    <div class="padding">
        <h1 class="stocks">Акции</h1>
        <form action="/admin/tables/admin.info.php" method="post">
            <button name="addStock" class="btn btn-to-basket">Добавить</button>
        </form>
        <div class="card">
            <hr class="hr-admin-act">
            <?php foreach ($stocks as $stocks): ?>
                <ul class="list-group22 list-group-flush list-group">
                    <li class="list-group-item brands-position">
                        <?= $stocks->name ?>
                    </li>
                    <li class="list-group-item brands-position"><img src="/uploads/<?= $stocks->img ?> " alt=""></li>
                    <li class="list-group-item brands-position">
                        <?= $stocks->category ?>
                    </li>
                    <li class="list-group-item brands-position">
                        <?= $stocks->date_of_creation ?>
                    </li>
                    <li class="list-group-item brands-position">
                        <?= $stocks->closing_date ?>
                    </li>
                    <li class="list-group-item brands-position"><button class="delStock"
                            data-id="<?= $stocks->id ?>">del</button></li>
                </ul>
                <hr class="hr-admin-act">
            <?php endforeach ?>
        </div>
        <h1>Актуальные вопросы</h1>
        <div class="card1">
            <form class="createTopical" action="/admin/tables/admin.info.php" method="POST">
                <div>
                    Введите вопрос:
                    <input type="text" class="form-control" name="name">
                </div>
                <div>
                    Введите ответ:
                    <input type="text" class="form-control" name="text">
                </div>

                <div class="form-group">
                    <button class="buttonInsertBtn" name="InsertBtn">Добавить</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="card1">
            <ul class="list-group1 list-group-flush1">
                <li class="list-group-item1 brands-position">Вопрос</li>
                <li class="list-group-item1 brands-position">Ответ</li>
                <li class="list-group-item1 brands-position"> </li>
            </ul>
            <hr>
            <?php foreach ($topical as $item): ?>
                <ul class="list-group11123 list-group1 list-group-flush1">
                    <li class="list-group-item1 brands-position1">
                        <?= $item->name ?>
                    </li>
                    <li class="list-group-item1 brands-position1">
                        <?= $item->text ?>
                    </li>
                    <li class="list-group-item1 brands-position1"><button class="del"
                            data-id="<?= $item->id ?>">del</button></li>
                </ul>
                <hr>
            <?php endforeach ?>
        </div>
        <h1>Слоган</h1>
        <div class="card1">
            <form class="createTopical" action="/admin/tables/admin.info.php" method="POST">
                <div>
                    Введите слоган:
                    <input type="text" class="form-control" name="name1">
                </div>
                <div>
                    <div class="form-group">
                        <button class="buttonInsertBtn1" name="InsertBtn1">Изменить</button>
                    </div>
            </form>
        </div>
        <hr>
        <div class="card2">
            <hr>
            <?php foreach ($tagline as $item): ?>
                <ul class="list-group2 list-group-flush2">
                    <li class="list-group-item2 brands-position2">
                        <?= $item->tagline ?>
                    </li>
                </ul>
                <hr>
            <?php endforeach ?>
        </div>
        <h1>Нам стоит доверять</h1>
        <div class="card3">
            <form class="createWeShould" action="/admin/tables/admin.info.php" method="POST" enctype="multipart/form-data" >
                <div>
                    Введите текст:
                    <input type="text" class="form-control" name="we_should_trust">
                </div>
                <div>
                    Загрузите картинку:
                    <div>
                        <input type="file" name="image" id="file" class="custom-file-input" title="Изменить картинку">
                    </div>
                </div>
                <div class="form-group">
                        <button class="buttonInsertBtn" name="InsertBtn3" type="submit">Добавить</button>
                </div>
            </form>
        </div>
        <div class="card3">
            <div class="list-group4 list-group-flush3">
                <div class="list-group-item3 brands-position">Название</div>
                <div class="list-group-item3 brands-position">Картинка</div>
                <div class="list-group-item3 brands-position">. </div>
            </div>
            <hr>
            <?php foreach ($we_should_trust as $item): ?>
                <div class="list-group3 list-group2232  list-group-flush3">
                    <div class="list-group-item3 brands-position3">
                        <p>
                            <?= $item->text ?>
                        </p>
                    </div>
                    <div class="list-group-item3 brands-position3">
                        <img src="/uploads/<?= $item->image ?>" alt="img" class="img-admin-we-should-trust">
                    </div>
                    <div class="list-group-item3 brands-position3"><button class="del3"
                            data-id="<?= $item->id ?>">del</button></div>
                </div>
                <hr>
            <?php endforeach ?>
        </div>
        <h1>Наши контакты</h1>
        <div class="card5 card5-form-flex">
            <form class="createContacts" action="/admin/tables/admin.info.php" method="POST" enctype="multipart/form-data" >
                <div>
                    Введите телефон:
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="form-group">
                        <button class="buttonInsertBtn" name="InsertBtnPhone" type="submit">Добавить</button>
                </div>
            </form>
            <form class="createContacts" action="/admin/tables/admin.info.php" method="POST" enctype="multipart/form-data" >
                
                <div>
                    Введите email:
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                        <button class="buttonInsertBtn" name="InsertBtnEmail" type="submit">Добавить</button>
                </div>
            </form>
            <form class="createContacts" action="/admin/tables/admin.info.php" method="POST" enctype="multipart/form-data" >
                
                <div>
                    Введите Соц сеть:
                    <input type="text" class="form-control" name="social">
                </div>
                <div class="form-group">
                        <button class="buttonInsertBtn" name="InsertBtnSocial" type="submit">Добавить</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="card5">
            <div>
                <div class="flex-card-5">
                    <div>Телефоны</div>
                    <div>Почта</div>
                    <div>Соц сеть</div>
                </div>
            </div>
<hr>
                <div class="flex-card-5">
                    <div>
                <?php foreach ($contacts as $item): ?>
                    <div class="brands-position5"><?= $item->phone ?><button class="delPhone"
                            data-id="<?= $item->id ?>">del</button></div>                
                <?php endforeach ?>
                </div>
                <div>
                <?php foreach ($contacts1 as $item): ?>
                    <div class="brands-position5"><?= $item->mail ?><button class="delMail"
                            data-id="<?= $item->id ?>">del</button>   </div>                    
                <?php endforeach ?>
                </div>
                <div>
                <?php foreach ($contacts2 as $item): ?>
                    <div class="brands-position5"><?= $item->social_media ?><button class="delSocial"
                            data-id="<?= $item->id ?>">del</button> </div>                
                <?php endforeach ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="/admin/assets/js/fetch.js"></script>
<script src="/admin/assets/js/loadTopical.js"></script>
<script src="/admin/assets/js/loadShouldTrust.js"></script>
<script src="/admin/assets/js/loadStocks.js"></script>
<script src="/admin/assets/js/loadContacts.js"></script>