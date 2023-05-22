function formatPromoCode() {
  var promoCodeInput = document.getElementById("promo-code");
  var value = promoCodeInput.value.replace(/[^0-9A-Za-z]/g, "");

  var formattedValue = "";
  for (var i = 0; i < value.length; i++) {
    if (i === 4 || i === 8) {
      formattedValue += "-";
    }
    formattedValue += value[i];
  }

  promoCodeInput.value = formattedValue.toUpperCase();
}

// Showing no items if there are none
function showNoItems() {
  // Get the unordered list element
  const ulElement = document.querySelector("ul.scroller");

  // Check if the list has any list items
  if (ulElement.getElementsByTagName("li").length === 0) {
    // Get the relevant divs and IDs
    const noItemsDiv = document.querySelector(".no-items");
    const checkoutButton = document.querySelector(".checkout-button");
    const shipping = document.querySelector("#shipping");
    const discount = document.querySelector("#discount");
    const taxCost = document.querySelector("#tax");
    const total = document.querySelector("#total");

    // Displaying the no-items div
    noItemsDiv.style.display = "flex";

    // Setting costs to 0
    shipping.textContent = "R 0";
    discount.textContent = "-R 0";
    tax.textContent = "R 0";
    total.textContent = "R 0";

    // Disabling checkout button
    checkoutButton.classList.add("disabled");
    checkoutButton.display = true;
  }
}

// Get all the trash icons
function deleteListItem() {
  const trashIcons = document.querySelectorAll(".fa-solid.fa-trash.fa-lg");

  // Attach an event listener to each of them
  trashIcons.forEach((trashIcon) => {
    trashIcon.addEventListener("click", (event) => {
      // Get the parent <li> element of the clicked trash icon
      const listItem = event.currentTarget.closest(".cart-item");

      // Remove the parent <li> element
      listItem.remove();

      //Showing no items div
      showNoItems();
    });
  });
}

showNoItems();
