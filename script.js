const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
});

addEventListener("scroll", () => {
  if (hamburger.classList.contains("active")) {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
  }
});
