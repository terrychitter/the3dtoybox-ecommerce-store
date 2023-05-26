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
    const total = document.querySelector("#bill-total");

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
    checkoutButton.disabled = true;
  }
}

showNoItems();

const cartItems = document.querySelectorAll(".cart-item");

// Function to handle item removal
function removeCartItem(productId) {
  // Removing the item from the cart
  window.location.href = "../remove_item_cart.php?product_id=" + productId;
}

// Loop through each cart item
cartItems.forEach((cartItem) => {
  // Get the data-productId value
  const productId = cartItem.getAttribute("data-productId");
  // Get the trash icon within the cart item
  const trashIcon = cartItem.querySelector(".fa-solid.fa-trash.fa-lg");

  // Attach click event listener to the trash icon
  trashIcon.addEventListener("click", () => {
    // Call the removeCartItem function with the productId
    removeCartItem(productId);
  });
});

function calculateBillTotal() {
  const cartItems = document.querySelectorAll(".cart-item");
  const shippingCost = document.getElementById("shipping");
  const discount = document.getElementById("discount");
  const tax = document.getElementById("tax");
  const billTotal = document.getElementById("bill-total");

  let total = 0;

  cartItems.forEach((cartItem) => {
    const priceElement = cartItem.querySelector(".col5 span:last-child");
    const priceText = priceElement.textContent.trim();
    const price = parseFloat(priceText.substring(2));

    if (!isNaN(price)) {
      total += price;
    }
  });

  const shippingValue = parseFloat(
    shippingCost.textContent.trim().substring(2)
  );
  const discountValue = parseFloat(discount.textContent.trim().substring(2));
  const taxValue = parseFloat(tax.textContent.trim().substring(2));

  if (!isNaN(shippingValue) && !isNaN(discountValue) && !isNaN(taxValue)) {
    total += shippingValue - discountValue + taxValue;
  }

  if (!isNaN(total)) {
    billTotal.textContent = "R " + total.toFixed(2);
  }
}

calculateBillTotal();

document.getElementById("checkout-btn").addEventListener("click", function () {
  // Get all the product IDs and store them in an array
  var productIDs = [];
  var productElements = document.getElementsByClassName("cart-item");
  for (var i = 0; i < productElements.length; i++) {
    var productID = productElements[i].getAttribute("data-productID");
    productIDs.push(productID);
  }

  // Get the bill total amount
  var billTotal = document.getElementById("bill-total").textContent;
  billTotal = billTotal.replace("R ", ""); // Remove the 'R ' prefix

  // Construct the URL with the product IDs and bill total as query parameters
  var url = "../process_order.php?";
  for (var j = 0; j < productIDs.length; j++) {
    url += "product_ids[]=" + encodeURIComponent(productIDs[j]) + "&";
  }
  url += "bill_total=" + encodeURIComponent(billTotal);

  // Redirect to the process_order.php page
  window.location.href = url;
});
