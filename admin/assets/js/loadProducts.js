document.addEventListener("DOMContentLoaded", () => {
    let countProducts = document.querySelector(".count-products");
    let containerProducts = document.querySelector(".orders");
    let categoriesChecks = document.querySelectorAll("[name = category]");
    let catsChecks = document.querySelectorAll("[name = category]:not(#all)");
    let categoriesAllCheck = document.getElementById("all");
    let valuesChecks = [];
    catsChecks.forEach((i) => {
      valuesChecks.unshift(i.value);
    });
    getProductsByCategories(valuesChecks);
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
        //проверка для включения ВСЁ
        if (checksChecked(catsChecks)) categoriesAllCheck.checked = true;
        else categoriesAllCheck.checked = false;
        let categoriesChecked = [...categoriesChecks]
          .filter((item) => item.checked)
          .map((item) => item.value);
        await getProductsByCategories(categoriesChecked);
      });
    });
    async function getProductsByCategories(categoriesID) {
  
      //2 способ
      let parameter = new URLSearchParams();
      parameter.append("category", JSON.stringify(categoriesID));
  
      let products = await getData("/app/tables/products/search.check.php", parameter);
      outOnPange(products);
    }
    function outOnPange(products) {
      countProducts.textContent = products.length + " шт";
  
      containerProducts.innerHTML = "";
  
      products.forEach((product) => {
        containerProducts.insertAdjacentHTML("beforeend", getOneCard(product));
      });
    }
    function getOneCard({ product_id, product_name, country, category, price, created_at, updated_at }) {
      return `
      <table class="table">
    <tbody>
  
      <tr id="${product_id}">
      
        <td >${product_name}</td>
        <td>${price}</td>
        <td> ${country}</td>
        <td> ${category}</td>
        <td> ${created_at}</td>
        <td> ${updated_at}</td>
  
        <td><a href="/app/admin/tables/show.php?id=${product_id}" name="btn_red" class="btn btn-primary" >Редактировать</a></td>
        <td><a href="/app/admin/tables/showOne.php?id=${product_id}" name="btn_show" class="btn btn-primary" >Просмотр</a></td>
        <td><a href="/app/admin/tables/delete.php?id=${product_id}" name="btn_red" class="btn btn-primary" >Удалить</a></td>
      </tr>
  </thead>
  </table >
  
          `
          ;
    }
  
    document.addEventListener("click", async (event) => {
      if (event.target.classList.contains("deleteProduct")) {
        let id = event.target.dataset.idproduct;
  
        let res = await postJSON(
          "/app/admin/tables/baskets/create.php",
          id,
          "add"
        );
  
      }
    });
  });
  