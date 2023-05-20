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

// Get all the trash icons
const trashIcons = document.querySelectorAll(".fa-solid.fa-trash.fa-lg");

// Attach an event listener to each of them
trashIcons.forEach((trashIcon) => {
  trashIcon.addEventListener("click", (event) => {
    // Get the parent <li> element of the clicked trash icon
    const listItem = event.currentTarget.closest(".wishlist-item");

    // Remove the parent <li> element
    listItem.remove();
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
