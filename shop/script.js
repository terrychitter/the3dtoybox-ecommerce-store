const buttons = document.querySelectorAll("[data-carousel-button]");
const intervalTime = 5000; // 5 seconds

// Call the promotionalSlideNext function every 5 seconds
const intervalId = setInterval(() => {
  promotionalSlideNext(buttons[0]);
}, intervalTime);

buttons.forEach((button) => {
  button.addEventListener("click", () => {
    promotionalSlideNext(button);
  });
});

function promotionalSlideNext(button) {
  const offset = button.dataset.carouselButton === "next" ? 1 : -1;
  const slides = button
    .closest("[data-carousel]")
    .querySelector("[data-slides]");

  const activeSlide = slides.querySelector("[data-active]");
  let newIndex = [...slides.children].indexOf(activeSlide) + offset;

  if (newIndex < 0) newIndex = slides.children.length - 1;
  if (newIndex >= slides.children.length) newIndex = 0;

  slides.children[newIndex].dataset.active = true;
  delete activeSlide.dataset.active;
}

// Stop the automatic slide change when the user clicks a button
buttons.forEach((button) => {
  button.addEventListener("click", () => {
    clearInterval(intervalId);
  });
});
