<?php
session_start();
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/reg.css">
    <title>Регистрация</title>
<section>
    <div class="form-box">
        <div class="form-value">
            <form action="/app/tables/users/reg.check.php" method="post" class="form">
                <h2>Регистрация</h2>
                <div class="input-box">
                    <ion-icon name="people-outline"></ion-icon>
                    <input value="<?= $_SESSION["name"] ?? "" ?>"required type="text" name="name" class="form-control"
                        id="name">
                        <label for="name" class="form-label">Имя</label>
                </div>
                <p class="right-p">
                    <?= $_SESSION["errors"]["name"] ?? "" ?>
                </p>
                <div class="input-box">
                <ion-icon name="people-outline"></ion-icon>
                    <input value="<?= $_SESSION["surname"] ?? "" ?>"required type="text" name="surname" class="form-control"
                        id="surname">
                        <label for="surname" class="form-label">Фамилия</label>
                </div>
                <p class="right-p">
                    <?= $_SESSION["errors"]["surname"] ?? "" ?>
                </p>
                <div class="input-box">
                <ion-icon name="people-outline"></ion-icon>
                    <input value="<?= $_SESSION["patronymic"] ?? "" ?>"required type="text" name="patronymic"
                        class="form-control" id="patronymic">
                        <label for="patronymic" class="form-label">Отчество</label>
                </div>
                <p class="right-p">
                    <?= $_SESSION["errors"]["patronymic"] ?? "" ?>
                </p>
                <div class="input-box">
                <ion-icon name="person-outline"></ion-icon>

                    <input value="<?= $_SESSION["login"] ?? "" ?>"required type="text" name="login" class="form-control"
                        id="login" >
                        <label for="login" class="form-label">Логин</label>
                </div>
                <p class="right-p">
                <p class="right-p">
                    <?= $_SESSION["errors"]["login"] ?? "" ?>
                </p>
                </p>
                <div class="input-box">
                <ion-icon name="mail-outline"></ion-icon>
                    <input value="<?= $_SESSION["email"] ?? "" ?>"required type="text" name="email" class="form-control"
                        id="email" >
                        <label for="email" class="form-label">ваша почта</label>
                </div>
                <p class="right-p">
                    <?= $_SESSION["errors"]["email"] ?? "" ?>
                </p>
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>

                    <input type="password" name="password"required class="form-control" id="password">
                    <label for="password" class="form-label">Пароль</label>
                </div>
                <p class="right-p">
                    <?= $_SESSION["errors"]["password"] ?? "" ?>
                </p>
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password_confirmation"required class="form-control" id="password_confirm">
                    <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                </div>
                <p class="right-p">
                    <?= $_SESSION["errors"]["password"] ?? "" ?>
                </p>
                <button class="submit_accept" name="btn">Зарегестрироваться</button>
                <div class="register">
                    <p>Есть аккаунта? <a href="/app/tables/users/auth.php">Авторизуйтесь</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php unset($_SESSION["error"]); ?>