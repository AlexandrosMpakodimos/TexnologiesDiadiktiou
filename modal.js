document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("loginModal");
  const openBtn = document.getElementById("modal-button-login");
  const closeBtn = document.querySelector(".modal .close");

  openBtn.addEventListener("click", () => {
    modal.style.display = "flex";
  });

  closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
  });
});
