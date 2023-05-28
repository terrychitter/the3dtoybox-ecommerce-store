document.addEventListener("DOMContentLoaded", function () {
  const addToCartButtons = document.querySelectorAll(".add-to-cart");
  const heartIcon = document.querySelector(".fa-heart");
  const removeFromCartButtons = document.querySelectorAll(
    ".add-to-cart.remove"
  );

  // Attach event listener to "Add to Cart" buttons
  addToCartButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      const productID = button
        .closest(".product-details")
        .getAttribute("data-productID");
      window.location.href = "../add_item_cart.php?product_id=" + productID;
    });
  });

  // Attach event listener to "Remove from Cart" buttons
  removeFromCartButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      const productID = button
        .closest(".product-details")
        .getAttribute("data-productID");
      window.location.href = "../remove_item_cart.php?product_id=" + productID;
    });
  });

  // Check the initial class of the heart icon
  const isRegularHeart = heartIcon.classList.contains("fa-regular");

  // Add a click event listener to the heart icon
  heartIcon.addEventListener("click", () => {
    // Check the updated class of the heart icon
    const isRegularHeartNow = heartIcon.classList.contains("fa-regular");

    const productId = heartIcon
      .closest(".product-details")
      .getAttribute("data-productID");

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
});

const shareDiv = document.querySelector(".share");

shareDiv.addEventListener("click", function () {
  // Get the current page URL
  const currentURL = window.location.href;

  // Remove all parameters except for product_id
  const urlWithoutParams = removeURLParameters(currentURL, ["product_id"]);

  // Copy the modified URL to the clipboard
  copyToClipboard(urlWithoutParams);

  // Display a success message
  alert("Link copied to clipboard");
});

// Function to remove URL parameters
function removeURLParameters(url, paramsToRemove) {
  const urlParts = url.split("?");

  if (urlParts.length > 1) {
    const baseUrl = urlParts[0];
    const queryParams = urlParts[1].split("&");
    const updatedParams = queryParams.filter((param) => {
      const paramName = param.split("=")[0];
      return paramsToRemove.includes(paramName);
    });

    if (updatedParams.length > 0) {
      return baseUrl + "?" + updatedParams.join("&");
    } else {
      return baseUrl;
    }
  } else {
    return url;
  }
}

// Function to copy text to clipboard
function copyToClipboard(text) {
  const textarea = document.createElement("textarea");
  textarea.value = text;
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand("copy");
  document.body.removeChild(textarea);
}
