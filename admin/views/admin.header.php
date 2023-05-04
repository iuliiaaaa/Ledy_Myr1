<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/admin/assets/css/stile.admin.css">
</head>
<body>
    <div class="admin">
        <div class="navigation">
            <a href="/admin/tables/admin.product.php">Товары</a>
            <a href="/admin/tables/admin.category.php">Категории</a>
            <a href="/admin/tables/admin.brands.php">Бренды</a>
            <a href="/admin/tables/admin.info.php">Информация</a>
            <a href="/admin/tables/admin.order.php">Заказы</a>
            <a href="/admin/tables/admin.com.php">Отзывы</a>
            <form class="exitAdmin" action="/admin/tables/admin.php" method="POST">
            <button name="exitAdmin" class="exitAdmin">Выход</button>
            </form>
        </div>
        <div class="main">
        </div>
    </div>