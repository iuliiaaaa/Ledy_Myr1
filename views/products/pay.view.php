<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<title>Оплата и доставка</title>
<main class="index-main">
  <div class="container-div-main">
    <h2>Оплата</h2>
    <hr class="hr-paddisng">
    <div class="cardPay where-block-main">
      <?php foreach ($payInfo as $questions): ?>
        <div class="btn-group dropdown-center">
          <button type="button" class="btn btn-secondary btn-danger dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="true" value="">
            <?= $questions->question ?>
          </button>
          <ul class="dropdown-menu">
            <p class="dropdown-item">
              <?= $questions->text ?>
            </p>
          </ul>
        </div>
        <br>
      <?php endforeach ?>
      <hr class="hr-paddisng-bot">
      <h2>Пункты выдачи</h2>
      <div class="cardDelivery">
        <?php foreach ($delivery as $questions): ?>
          <div class="widh-delivery">
            <?= $questions->point_of_issue ?>
          </div>
        <?php endforeach ?>
      </div>
      <br>
      <br>
      <br>
      <div class="cardMaps">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d72926.58909621234!2d61.32834671890182!3d55.166547527265784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0JvQtdC00LjQnNGD0YA!5e0!3m2!1sru!2sru!4v1681721265391!5m2!1sru!2sru"
          width="100%" height="400px" style="border:0; max-width:600px;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
</main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>