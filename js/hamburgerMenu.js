const hamMenu = document.querySelector(".hamburger");
const authMenu = document.querySelector(".auth");

hamMenu.addEventListener("click", () => {
    hamMenu.classList.toggle("active");
    authMenu.classList.toggle("active");
})

document.querySelectorAll(".nav-item").forEach(n => n.addEventListener("click", () => {
    hamMenu.classList.remove("active");
    authMenu.classList.remove("active");
}))


