const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-links");
    const authMenu = document.querySelector(".auth");

    hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
        authMenu.classList.toggle("active");
    })
    
    document.querySelectorAll(".nav-item").forEach(n => n.addEventListener("click", () => {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
        authMenu.classList.remove("active");
    }))