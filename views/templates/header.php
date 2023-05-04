<?php
session_start();
use App\models\User;
$users1 = User::getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/slider.css">
    <link rel="stylesheet" href="/assets/css/basket.css">
    <script defer src="/assets/js/slider.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</head>
<body>
    <div class="menu-btn">
		<span></span>
		<span></span>
		<span></span>
	</div>
    <header class="header-nav-bar menu">
        <div class="div-nav-bar">
            <ul class="nav-bar">
                <?php if (!isset($_SESSION["avtorisation"]) || !$_SESSION["avtorisation"]): ?>
                    <li class="link-nav"><a href="/app/tables/users/auth.php">Войти</a></li>
                <?php else: ?>
                    <div class="flex-prof">
                        <div>
                            <?php foreach ($users1 as $users1): ?>
                                <?php if ($users1->id == $_SESSION["id"]): ?>
                                    <?php if ($users1->avatar != null): ?>
                                        <img src="/uploads/<?= $users1->avatar ?>" alt="" class="auth-logo">
                                        <?php else: ?>
                                        <img src="/uploads/stravatar.jpg" alt="img" class="auth-logo">
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                        <div class="bar-act">
                            <li class="link-nav"><a href="/app/tables/users/profile.php">
                                    <?= $_SESSION["login"] ?? "Имя" ?>
                                </a></li>
                            <li class="link-nav"><a href="/app/tables/users/logout.php">Выйти</a></li>
                        </div>
                    </div>
                <?php endif ?>
                <li class="nav-link"><a href="/" style="text-decoration: none;">Главная</a></li>
                <li class="nav-link"><a href="/app/tables/users/catalog.php" style="text-decoration: none;">Каталог</a>
                </li>                <?php if (!isset($_SESSION["avtorisation"]) || !$_SESSION["avtorisation"]): ?>
                <?php else: ?>
                    <li class="nav-link"><a href="/app/tables/users/basket.php" style="text-decoration: none;">Корзина</a></li>
                <?php endif ?>

                <li class="nav-link"><a href="/app/tables/users/information.site.php" style="text-decoration: none;">О нас</a></li>
                <li class="nav-link"><a href="/app/tables/users/pay.php" style="text-decoration: none;">Оплата и доставка</a></li>
                <li class="nav-link"><a href="/app/tables/users/comments.php" style="text-decoration: none;">Отзывы</a></li>
            </ul>
        </div>
        <div class="header-logo-site">
            <a href="/"><img src="/uploads/ЛОГО-transformed.png" alt="" class="img-header-logo"></a>
        </div>
    </header>