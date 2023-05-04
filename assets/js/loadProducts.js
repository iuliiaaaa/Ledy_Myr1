document.addEventListener("DOMContentLoaded", () => {
  let countProducts = document.querySelector(".count-products");
  let containerProducts = document.querySelector(".product-container");
  let categoriesChecks = document.querySelectorAll("[name = category]");
  let catsChecks = document.querySelectorAll("[name = category]:not(#all)");
  let categoriesAllCheck = document.getElementById("all");
  let valuesChecks =[];
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
      if (checksChecked(catsChecks)) categoriesAllCheck.checked = true;
      else categoriesAllCheck.checked = false;
      let categoriesChecked = [...categoriesChecks]
        .filter((item) => item.checked)
        .map((item) => item.value);
      await getProductsByCategories(categoriesChecked);
    });
  });
  async function getProductsByCategories(categoriesID) {
    let parameter = new URLSearchParams();
    parameter.append("category", JSON.stringify(categoriesID));
    let products = await getData("/app/tables/users/serch.check.php", parameter);
    outOnPange(products);
  }
  function outOnPange(products) {
    countProducts.textContent = products.length + " шт";
    containerProducts.innerHTML = "";
    products.forEach((product) => {
      containerProducts.insertAdjacentHTML("beforeend", getOneCard(product));
    });
  }
  function getOneCard({product_id, product_name, img, price, brand }) {
    return `
        <div class="card-catalog">
            <div id="${product_id}" class="card-catalog-nv" style="width: 18rem;">
                <img src="/uploads/${img}" class="card-img" alt="${img}">
                <div class="card-text">
                    <h5 class="card-h5">${product_name}</h5>
                    <h5 class="card-h5">${brand}</h5>
                    <p class="card-text-price">${price}₽</p>
                    <br>  <br>          
                  <p><button data-idproduct="${product_id}" class=" btn btn-to-basket" id="btn-to-basket-${product_id}">В корзину</button></p>
                    </div>
            </div>
        </div>
        `;
  }
  document.addEventListener("click", async (event) => {
    if (event.target.classList.contains("btn-to-basket")) {
      let id = event.target.dataset.idproduct;
      console.log(id);
      let res = await postJSON(
        "/app/tables/users/save.basket.php",
        id,
        "add"
      );
    }
  });
});
  