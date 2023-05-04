<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.header.php";
?>
<main class="index-main">
    <div class="container-div-main" >
        <div class="container-com">
        <h1 style="">Отзывы</h1>
        </div>
            <hr>
        <div class="card12 com-flex12">
        <?php foreach ($com as $item): ?>
            <hr>
            <ul class="list-group-com ">
                    <li class="list-group-item com-position"><p><?= $item->name ?></p></li>
                    <li class="list-group-item com-position"><p><?= $item->text ?></p></li>
                    <li class="list-group-item com-position"><p><?= $item->date_of_creation ?></p></li>
                    <li class="list-group-item com-position">
                        
                        <button class="delCom" data-id="<?= $item->id ?>">del</button>
                    </li>
            </ul>
            <?php endforeach ?>
        </div>
    </div>
</main>
<script src="/admin/assets/js/fetch.js"></script>
<script src="/admin/assets/js/loadCom.js"></script>