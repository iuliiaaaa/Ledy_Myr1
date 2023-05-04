document.addEventListener("click", async (e) => {
  
    if (e.target.classList.contains("delPhone")) {
    id = e.target.dataset.id;
    console.log(id);
    let response = await fetch("/admin/tables/admin.phone.deleted.php", {
      method: "POST",
      headers: {"Content-Type": "application/json;charset=UTF-8",},
      body: JSON.stringify({ id }),
    });
    e.target.closest(".brands-position5").remove();

    let res = await response.json();
    console.log(res);
  }
});
document.addEventListener("click", async (e) => {
  
    if (e.target.classList.contains("delMail")) {
    id = e.target.dataset.id;
    console.log(id);
    let response = await fetch("/admin/tables/admin.mail.deleted.php", {
      method: "POST",
      headers: {"Content-Type": "application/json;charset=UTF-8",},
      body: JSON.stringify({ id }),
    });
    e.target.closest(".brands-position5").remove();

    let res = await response.json();
    console.log(res);
  }
});
document.addEventListener("click", async (e) => {
  
    if (e.target.classList.contains("delSocial")) {
    id = e.target.dataset.id;
    console.log(id);
    let response = await fetch("/admin/tables/admin.social.deleted.php", {
      method: "POST",
      headers: {"Content-Type": "application/json;charset=UTF-8",},
      body: JSON.stringify({ id }),
    });
    e.target.closest(".brands-position5").remove();

    let res = await response.json();
    console.log(res);
  }
});