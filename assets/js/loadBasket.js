let main = document.getElementById("cards");

if (main.childNodes.length <= 1) {
  main.innerHTML = "Бегом за покупочками";
  document.querySelector(".arrange").disabled = true;
}
async function outResult(productId, action) {
  console.log(productId)
  let { product, allPrice, allCount } = await postJSON(
    "/app/tables/users/save.basket.php",
    productId,
    action
  );
  if (allPrice == null) {
    main.textContent = "Бегом за покупочками";
    document.querySelector(".arrange").disabled = true;
  } else {
    if (product != "delete") {
      document.getElementById(
        `product-count-${productId}`
      ).innerHTML = `${product.count}`;
    }
  }
  document.getElementById("total-price").textContent = `Сумма: ${allPrice}Р`;
  document.getElementById("total-count").textContent = `Колличество: ${allCount.sum} шт`;
}
document.addEventListener("DOMContentLoaded", () => {
  document.addEventListener("click", async (event) => {
    let id = event.target.dataset.productId;
    console.log(event.target)
    console.log(event.currentTarget)
    console.log(event)
    if (event.target.classList.contains("btn-minus-item")) {
      outResult(id, "dash");
    }
    if (event.target.classList.contains("plus")) {
      outResult(id, "add");
    }
    if (event.target.classList.contains("delete")) {
      console.log(id);
      main.removeChild(document.getElementById(`productInBasket-${id}`));
      outResult(id, "delete");
    }
    if (event.target.classList.contains("clear")) {
      outResult("", "clear");
      document.querySelectorAll(".productInBasket").forEach((item) => {
        item.remove();
      });
    }
  });
});