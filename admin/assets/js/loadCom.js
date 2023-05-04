document.addEventListener("click", async (e) => {
  
    if (e.target.classList.contains("delCom")) {
    id = e.target.dataset.id;
    console.log(id);
    let response = await fetch("/admin/tables/admin.com.deleted.php", {
      method: "POST",
      headers: {"Content-Type": "application/json;charset=UTF-8",},
      body: JSON.stringify({ id }),
    });

    e.target.closest(".list-group-com").remove();

    let res = await response.json();
    console.log(res);
  }
});