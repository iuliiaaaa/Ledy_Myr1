<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<title>О нас</title>
<main class="index-main">
    <div class="container-div-main">
            <h2>О нас</h2>
        <div class="info-block-1">
            <div>
            <?php foreach ($tagline as $tagline): ?>
                <h3><?= $tagline -> tagline?></h3>
                <?php endforeach ?>
            </div>
        </div>
        <h2>Нам стоит доверять</h2>
        <hr class="color-hr-about">
        <div class="info-block-2">
        <?php foreach ($allAboutAs as $allAboutAs): ?>
            <div class="flex-info-dr">
                <div>
                    <h3><?= $allAboutAs -> text?></h3>
                </div>
                <div>
                    <img src="/uploads/<?= $allAboutAs -> image?>" alt="imgAboutAs" class="imgAboutAs">
                </div>
            </div>
            <hr class="color-hr-about">
    <?php endforeach ?>
        </div>
        <h2>Наши контакты</h2>
        <div class="info-block-contacts">
            <div>
            <?php foreach ($allAboutAs1 as $allAboutAs1): ?>
                <p><?= $allAboutAs1 -> phone?></p>
            <?php endforeach ?>
            </div>
            <div>
            <?php foreach ($allAboutAs2 as $allAboutAs2): ?>
                <p><?= $allAboutAs2 -> mail?></p>
            <?php endforeach ?>
            </div>
            <div>
            <?php foreach ($allAboutAs3 as $allAboutAs3): ?>
                <p><?= $allAboutAs3 -> social_media?></p>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</main>
