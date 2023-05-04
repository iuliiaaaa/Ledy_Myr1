<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<title>Главная</title>
<main class="index-main">
    <div class="container-div-main">
                    <h2>Акции</h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($stocks as $stocks): ?>
                    <div class="swiper-slide">
                        <img src="/uploads/<?= $stocks->img ?>" alt="img">
                        <div class="name-stocks">
                            <a href="/app/tables/users/catalog.php">
                                <h2><?= $stocks->name ?></h2>
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
                    <h2>Актуальные вопросы</h2>
        <div class="where-block-main">
        <?php foreach ($questions as $questions): ?>
            <div class="btn-group dropdown-center">
                <button type="button" class="btn btn-secondary btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="true" value="">
                    <?= $questions->name ?>
                </button>
                <ul class="dropdown-menu">
                    <p class="dropdown-item"><?= $questions->text ?></p>
                </ul>
            </div>
            <br>
        <?php endforeach ?>
        </div>
            <h2>Популярные бренды</h2>
        <div class="brends-main-block">
                    <ul class="ul-brends">
                        <?php foreach ($brands as $brands): ?>
                        <li class="li-brends"><?= $brands->name ?></li>
                        <?php endforeach ?>
                    </ul>
        </div>
        <h2>Последние отзывы</h2>
        <div class="comments-main-block1">
                        <?php foreach ($com5last as $com5last): ?>
                            <hr>
                            <div class="comments-main-block">
                            <div>
                            <?php if ($com5last->avatar != null): ?>
              <img src="/uploads/<?= $com5last->avatar ?>" alt="avatar" class="avatar-comments">
              <?php else: ?>
              <img src="/uploads/stravatar.jpg" alt="avatar" class="avatar-comments">
              <?php endif ?>
                            </div>
                            <div class="flex-comments">
                                <div>
                                    <p class="login-comments"><?= $com5last->login ?></p>
                                    <p class="login-comments1"><?= $com5last->date_of_creation ?></p>
                                </div>
                            <div>
                                <p class="text-comments"><?= $com5last->text ?></p>
                            </div>
                            </div>
                            </div>
                        <?php endforeach ?>
        </div>
    </div>
</main>
<? include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>