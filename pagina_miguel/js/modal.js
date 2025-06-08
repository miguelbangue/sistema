document.addEventListener("DOMContentLoaded", () => {

const imagenModal = document.querySelector(".imagenmodal");
const modal = document.getElementById("modal");
const modalClose = document.querySelector(".close");

imagenModal.addEventListener("click", () => {
    modal.style.display = "block";
    
});

modalClose.addEventListener("click", () => {
    modal.style.display = "none";
});

modal.addEventListener("click", () => {
    modal.style.display = "none";
})
});