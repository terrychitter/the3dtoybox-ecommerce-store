// Function to remove parameters from the URL
function removeParamsFromUrl(url, paramsToRemove) {
  // Create an anchor element with the provided URL
  const parser = document.createElement("a");
  parser.href = url;

  // Get the URL parameters as an object
  const queryParams = new URLSearchParams(parser.search);

  // Remove the specified parameters from the URL
  paramsToRemove.forEach((param) => {
    queryParams.delete(param);
  });

  // Set the updated parameters to the anchor element
  parser.search = queryParams.toString();

  // Return the updated URL
  return parser.href;
}

// Remove "success" or "error" parameters from the URL
function removeSuccessErrorParams() {
  // Get the current URL
  const currentUrl = window.location.href;

  // Remove "success" or "error" parameters from the URL
  const updatedUrl = removeParamsFromUrl(currentUrl, ["success", "error"]);

  // Replace the current URL in the browser history
  window.history.replaceState({}, document.title, updatedUrl);
}

// Call the function to remove "success" or "error" parameters on page load
removeSuccessErrorParams();
