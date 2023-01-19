const hamMenu = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-links");
const authMenu = document.querySelector(".auth");

hamMenu.addEventListener("click", () => {
    hamMenu.classList.toggle("active");
    navMenu.classList.toggle("active");
    authMenu.classList.toggle("active");
})

document.querySelectorAll(".nav-item").forEach(n => n.addEventListener("click", () => {
    hamMenu.classList.remove("active");
    navMenu.classList.remove("active");
    authMenu.classList.remove("active");
}))
