document.addEventListener("DOMContentLoaded", () => {
  let countProducts = document.querySelector(".count-orders");
  let containerProducts = document.querySelector(".container-orders");
  let categoriesChecks = document.querySelectorAll("[name = status]");
  let catsChecks = document.querySelectorAll("[name = status]:not(#all)");
  let categoriesAllCheck = document.getElementById("all");

  let valuesChecks = [];
  console.log(valuesChecks);
  catsChecks.forEach((i) => {
    valuesChecks.unshift(i.value);
  });
  getOrdersByStatuses(valuesChecks);
  function checksChecked(arr) {
    check = 0;
    arr.forEach((i) => {
      if (i.checked) check++;
    });

    return check == arr.length;
  }
  categoriesAllCheck.addEventListener("change", () => {

    if (categoriesAllCheck.checked) {
      catsChecks.forEach((i) => {
        i.checked = true;
      });
    } else {
      catsChecks.forEach((i) => {
        i.checked = false;
      });
    }
  });


  categoriesChecks.forEach((btn) => {
    btn.addEventListener("change", async () => {
      //проверка для включения всего
      if (checksChecked(catsChecks)) categoriesAllCheck.checked = true;
      else categoriesAllCheck.checked = false;
      let categoriesChecked = [...categoriesChecks]
        .filter((item) => item.checked)
        .map((item) => item.value);
      await getOrdersByStatuses(categoriesChecked);
    });
  });

  async function getOrdersByStatuses(categoriesID) {

    //2 способ
    let parameter = new URLSearchParams();
    parameter.append("status", JSON.stringify(categoriesID));

    let orders = await getData("/admin/tables/search.check.php", parameter);
    outOnPange(orders);
  }
  function outOnPange(orders) {
    countProducts.textContent = orders.length + " шт";
    containerProducts.innerHTML = "";
    console.log(orders)
    orders.forEach((order) => {
      containerProducts.insertAdjacentHTML("beforeend", getOneCard(order));
    });
  }
  function getOneCard({ order_id, login, status, date, count,price }) {
    return `
    <table class="table" width="100%" cellspacing="0" >
    <tbody>
    <tr>
    <td>${order_id}</td>
    <td>${login}</td>
    <td>${status}</td>
    <td> <form action="/admin/tables/admin.edit.status.php" method="POST"><button name="btn-redacte-status" value="${order_id}" class="btn btn-primary" data-order-id="${order_id}">Изменить</button> </form></td>
    <td>${date}</td>
    <td>${count}</td>
    <td>${price}</td>
    </tr>
    </tbody>
  </table >
          `
      ;
  }
});