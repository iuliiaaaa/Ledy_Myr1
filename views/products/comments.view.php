<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<title>Коментарии</title>
<main class="index-main">
  <div class="container-div-main">
        <h2>Отзывы</h2>
        <?php if (!isset($_SESSION["avtorisation"]) || !$_SESSION["avtorisation"]): ?>
<?php else: ?>
    <form action="/app/tables/users/comments.php" method="post">
        <input type="text"name="comment">
        <button type="submit" name="addComent" class="btn">Опубликовать</button>
    </form>
<?php endif ?>
    <br>
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
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>