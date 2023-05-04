document.addEventListener("click", async (e) => {
  
    if (e.target.classList.contains("delStock")) {
    id = e.target.dataset.id;
    console.log(id);
    let response = await fetch("/admin/tables/admin.stock.deleted.php", {
      method: "POST",
      headers: {"Content-Type": "application/json;charset=UTF-8",},
      body: JSON.stringify({ id }),
    });

    e.target.closest(".list-group22 ").remove();

    let res = await response.json();
    console.log(res);
  }
});