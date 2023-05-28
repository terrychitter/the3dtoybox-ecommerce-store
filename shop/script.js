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

//ADDING ITEMS TO THE WISHLIST
// Get all the product cards
console.log("Bottom script loaded");
const productCards = document.querySelectorAll(".product-card");

// Loop through each product card
productCards.forEach((productCard) => {
  // Find the heart icon element
  const heartIcon = productCard.querySelector(".fa-heart");

  // Get the data-productId value
  const productId = productCard.getAttribute("data-productId");

  // Check the initial class of the heart icon
  const isRegularHeart = heartIcon.classList.contains("fa-regular");

  // Add a click event listener to the product card
  productCard.addEventListener("click", () => {
    // Navigate to the product page with the corresponding product ID
    window.location.href = "../product/product.php?product_id=" + productId;
  });

  // Add a click event listener to the heart icon
  heartIcon.addEventListener("click", (event) => {
    event.stopPropagation(); // Stop event propagation

    // Check the updated class of the heart icon
    const isRegularHeartNow = heartIcon.classList.contains("fa-regular");

    // Add or remove the productId from the wishlist array
    if (isRegularHeartNow) {
      // Add productId to the wishlist
      console.log("Added to Wishlist");
      heartIcon.classList.remove("fa-regular");
      heartIcon.classList.add("fa-solid");
      window.location.href = "../add_item_wishlist.php?product_id=" + productId;
    } else {
      // Remove productId from the wishlist
      heartIcon.classList.remove("fa-solid");
      heartIcon.classList.add("fa-regular");
      window.location.href =
        "../remove_item_wishlist.php?product_id=" + productId;
    }
  });

  // Get all the add-to-cart buttons
  const addToCartButtons = productCard.querySelectorAll(".add-to-cart");
  // Attach an event listener to each of the add to cart button
  addToCartButtons.forEach((addToCartButton) => {
    addToCartButton.addEventListener("click", (event) => {
      event.stopPropagation(); // Stop event propagation

      // Use the captured productId from the closure
      const clickedProductId = productId;
      window.location.href =
        "../add_item_cart.php?product_id=" + clickedProductId;
    });
  });
});
