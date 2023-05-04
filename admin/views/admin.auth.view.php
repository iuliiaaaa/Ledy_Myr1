<?php
session_start();
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/auth.css">
    <title>Авторизация</title>
<div class="section">
    <div class="form-box">
        <div class="form-value">
            <form action="/admin/tables/admin.php" method="post" class="form">
                <h2>Авторизация</h2>
                <div class="input-box">
                    <ion-icon name="people-outline"></ion-icon>
                    <input value="<?= $_SESSION["login"] ?? "" ?>" type="text" name="login" class="login" id="login"
                        required>
                    <label for="login" class="form-label">Логин</label>
                </div>
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>

                    <input type="password" name="password" class="password" id="password" required>
                    <label for="password" class="form-label">Пароль</label>
                </div>
                <p class="error">
                    <?= $_SESSION["error"] ?? "" ?>
                </p>
                <button class="submit_accept" name="btnAc">Авторизоваться</button>
            </form>
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php unset($_SESSION["error"]); ?>