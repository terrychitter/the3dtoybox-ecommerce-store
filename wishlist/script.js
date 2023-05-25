// Get all the add-to-cart
const buttons = document.querySelectorAll(".add-to-cart");

// Attach an event listener to each of them
buttons.forEach((button) => {
  button.addEventListener("click", (event) => {
    // Setting the button to show the item was added to the cart
    const textElement = event.currentTarget.querySelector(".add-to-cart-text");
    textElement.textContent = "Added to Cart";

    // Allow for style changes
    event.currentTarget.classList.add("added");

    // Disable the button
    event.currentTarget.disabled = true;
  });
});

const wishlistItems = document.querySelectorAll(".wishlist-item");

// Loop through each product card
wishlistItems.forEach((wishlistItem) => {
  // Get the data-productId value
  const productId = wishlistItem.getAttribute("data-productId");
  // Get all the trash icons
  const trashIcons = document.querySelectorAll(".fa-solid.fa-trash.fa-lg");
  //Get all the add-to-cart buttons
  const addToCartButtons = document.querySelectorAll(".add-to-cart");

  // Attach an event listener to each trash icon
  trashIcons.forEach((trashIcon) => {
    trashIcon.addEventListener("click", (event) => {
      // Removing the item from wishlist
      window.location.href =
        "../remove_item_wishlist.php?product_id=" + productId;
    });
  });

  // Attach an event listener to each of add to cart button
  addToCartButtons.forEach((addToCartButton) => {
    addToCartButton.addEventListener("click", (event) => {
      // Adding the item to the cart
      window.location.href = "../add_item_cart.php?product_id=" + productId;
    });
  });
});

// Get the unordered list element
const ulElement = document.querySelector("ul.scroller");

// Check if the list has any list items
if (ulElement.getElementsByTagName("li").length === 0) {
  // Get the div element with the "no-items" class
  const noItemsDiv = document.querySelector(".no-items");

  // Displaying the no-items div
  noItemsDiv.style.display = "flex";
}
