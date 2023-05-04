<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/admin/views/admin.header.php'; ?>
<main class="index-main">
  <div class="container-div-main">
  <div class="container">
    <div class="container-com"><h1>Товары</h1></div>
    <!-- флажки для фильтрации -->
    <hr>
    <nav class="nav flex-column navvv">
      <div class="flex-option">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="category" id="all" checked value="all">
        <label class="form-check-label" for="all">
          Все товары
        </label>
      </div>
      <!-- фильтр по категориям -->
      <?php foreach ($categoryes as $category): ?>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="category" id="<?= $category->id ?>"
            value="<?= $category->id ?>">
          <label class="form-check-label" for="<?= $category->id ?>">
            <?= $category->name ?>
          </label>
        </div>
      <?php endforeach ?>
      </div>
      <p class="count-products"></p>
      <!-- <select class="form-select" id="select" aria-label="Default select example">
        <option class="option" value="ASCprice">По цене (&#8593;)</option>
        <option class="option" value="DESCprice">По цене (&#8595;)</option>
        <option class="option" value="ASCname">По наименованию (&#8593;)</option>
        <option class="option" value="DESCname">По наименованию (&#8595;)</option> -->
      </select>
    </nav>

    <!-- карточки с товарами-->
    <hr>
    <div class="pd-card-admin">
    <form class="createTopical" action="/admin/tables/admin.product.php" method="POST">
      <button name="addProd" class="btn btn-to-basket">Добавить продукт</button>
  </form>
    </div>
    <hr>
    <div class="carddd product-container">

</div>
  </div>
  </div>
</main>
<script src="/admin/assets/js/fetch.js"></script>
<script src="/admin/assets/js/loadProducts1.js"></script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>
<!-- избавиться от цикла на странице карточек -->