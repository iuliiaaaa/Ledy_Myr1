<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';
?>
<title>Профиль</title>
<main class="index-main">
  <div class="profile-redact pf-r">
    <?php foreach ($users as $users): ?>
      <?php if ($users->id == $_SESSION["id"]): ?>
        <div class="pf-r-bl-1">
          <form action="/app/tables/users/redact.avatar.php" method="POST" enctype="multipart/form-data">
            <ion-icon name="image-outline" class="img-file"></ion-icon>
            <div>
            <?php if ($users->avatar != null): ?>
              <input type="file" name="image" id="file" class="custom-file-input" title="Изменить картинку">
              <img src="/uploads/<?= $users->avatar ?>" alt="img" class="avatar-profile">
              <?php else: ?>
                <input type="file" name="image" id="file" class="custom-file-input" title="Изменить картинку">
              <img src="/uploads/stravatar.jpg" alt="img" class="avatar-profile">
              <?php endif ?>
            </div>
            <div>
              <button type="submit" name="img" class="inserImage">сохранить картинку</button>
            </div>
          </form>
        </div>
        <div class="pf-r-bl-2">
          <div class="pf-r-bl-2-info-bl-1">
            <p>
              <?= $users->name ?>
            </p>
            <p>
              <?= $users->surname ?>
            </p>
            <p>
              <?= $users->patronymic ?>
            </p>
          </div>
          <div class="pf-r-bl-2-info-bl-2">
            <p>login:
              <?= $users->login ?>
            </p>
            <p>email:
              <?= $users->email ?>
            </p>
          </div>
        <?php endif ?>
      <?php endforeach ?>
    </div>
  </div>
  <div class="order">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">№</th>
          <th scope="col">статус</th>
          <th scope="col">дата создания</th>
          <th scope="col">пункт выдачи</th>
          <th scope="col">товары</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($res as $res): ?>
          <?php if ($res->user_id == $_SESSION["id"]): ?>
            <tr>
              <td>
                <?= $res->id ?>
              </td>
              <td>
                <?= $res->status ?>
              </td>
              <td>
                <?= $res->date ?>
              </td>
              <td>
                <?= $res->delivery ?>
              </td>
              <form action="/app/tables/users/profile.php" method="post">
                <input name="orId" class="arrOrId" type="text" value="<?= $res->id ?>">
                <td><button name="order_id" data-order="<?= $res->id ?>" class="btn-order-tovar btn btn-to-basket"  style="margin-left:-10px;" >Товары</button></td>
              </form>
            </tr>
            <tr>
            <?php endif ?>
          <?php endforeach ?>
          </thead>
    </table>
  </div>
</main>
<script>
  document.querySelector(".custom-file-input").addEventListener("mouseover", function () {
    document.querySelector('.img-file').style.color = "rgba(255, 255, 255, 1)"
  })
  document.querySelector(".custom-file-input").addEventListener("mouseout", function () {
    document.querySelector('.img-file').style.color = "rgba(255, 255, 255, 0)"
  })
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>