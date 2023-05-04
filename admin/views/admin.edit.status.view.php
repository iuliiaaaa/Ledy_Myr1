<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/admin.header.php";
?>
<main class="index-main">
<div class="products container-div-main ">
    <br>
    <div style="text-align:center;"><h1>Изменить статус</h1></div>
<br>
<hr>
    <form action="/admin/tables/admin.order.php" method="POST" class="order-middle">
        <div>    <select name="status" id="categories">
        <?php foreach ($statuses as $c) : ?>
            <option name="status" value="<?= $c->id ?>"><?= $c->name ?></option>
        <?php endforeach ?>
    </select></div>
<div><input type="text" name="message"></div>
     <div>     <p><button name="btn-create-status" value="<?= $order_id ?>">Сохранить</button></p>
</div>
    </form>   
    <p><?= $_SESSION["error"]??"" ?></p>    
</div>
<script>
    let selectStatus = document.querySelector("[name = status]");
    document.addEventListener("click", (event) => {
        let status = selectStatus.value;
        let message = document.querySelector("[name = message]").value;
        let btn = document.querySelector("[name = btn-create-status]");
        console.log(status)
        if(status == 3 && message == "") {
            btn.disabled = true;
            
        } else{
            btn.disabled = false;
        }
    })
</script>
</main>
</body>
</html>
<?php
session_destroy();
?>