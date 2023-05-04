<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<title>Каталог</title>
<main class="index-main">
  <div class="container-div-main">
  <div class="container">
    <nav class="nav flex-column navvv">
      <div class="flex-option">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="category" id="all" checked value="all">
        <label class="form-check-label" for="all">
          Все товары
        </label>
      </div>
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
      </select>
    </nav>
    <div class="carddd product-container">
</div>
  </div>
  </div>
</main>
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadProducts.js"></script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>