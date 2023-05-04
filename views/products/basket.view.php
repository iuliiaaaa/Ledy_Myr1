<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; 
?>
    <title>Корзина</title>
<main class="index-main">
  <div class="container-div-main">
    <div id="cards">
    <?php foreach ($productsInBasket as $item): ?>
        <div class="productInBasket" id="productInBasket-<?=$item->product_id?>">
            <div class="flex-img-text">
            <div>
            <img src="/uploads/<?= $item->img ?>" alt="" class="img-baskets-product">
            </div>
            <div>
                <?= $item->product_name ?>
            </div>

            </div>
            <div class="item-basket">
            <div>
                <?= $item->price ?>
            </div>
            <button class="btn-minus-item dash" data-product-id="<?= $item->product_id ?>">
            <ion-icon name="remove-circle-outline" class="btn-icon-icons btn-minus-item"  data-product-id="<?= $item->product_id ?>"></ion-icon>
            </button>
                <div class="count-item-basket " id="product-count-<?= $item->product_id ?>"><?= $item->count ?></div>

                <button class="btn-plus-item plus" data-product-id="<?= $item->product_id ?>"><ion-icon name="add-circle-outline" class="btn-icon-icons plus" data-product-id="<?= $item->product_id ?>"></ion-icon></button>
                <button class="deleted delete" data-product-id="<?= $item->product_id ?>"><ion-icon name="trash-outline" class="btn-icon-icons delete" data-product-id="<?= $item->product_id ?>"></ion-icon></button>
            </div>
        </div>
    <?php endforeach ?>
    </div>
    <div class="total">
        <div class="basket-bl1">
        <h2 id="total-price" class="total-price"> Сумма: 
            <?= $totalSum->sum ?>₽
        </h2>
        <h2 id="total-count" class="total-count"> Колличество: 
            <?= $totalCount->sum ?> шт.
        </h2>
        </div>
        <div class="basket-bl2">
            <div>
        </div>
        <div>
        <p><button id="clear" class="clear btn-primary">Удалить все</button></p>
        </div>
        </div>
    </div>
</div>
    </div>
    </main>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="/assets/js/fetch.js" defer></script>
<script src="/assets/js/loadBasket.js" defer></script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php' ?>