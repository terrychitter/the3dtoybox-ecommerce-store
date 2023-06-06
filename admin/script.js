// Get all product items
console.log("Script Loaded");
const productItems = document.querySelectorAll(".product-item");

// Attach event listener to each product item
productItems.forEach((item) => {
  // Get the product ID from the data-productID attribute
  const productID = item.getAttribute("data-productID");

  // Attach click event listener to the trash icon
  const trashIcon = item.querySelector(".fa-trash");
  trashIcon.addEventListener("click", () => {
    // Construct the remove product URL with the product ID
    const removeProductURL = `../remove_product.php?product_id=${productID}`;

    // Change the page URL to the remove product URL
    window.location.href = removeProductURL;
  });
});
