<?php
// Include the database connection
include "db_conn.php";

// Check if the product ID is provided in the URL
if (isset($_GET['product_id'])) {
  // Sanitize the product ID to prevent SQL injection
  $productID = mysqli_real_escape_string($conn, $_GET['product_id']);

  // Construct the SQL query to delete the product
  $sql = "DELETE FROM products WHERE product_id = '$productID'";

  // Execute the query
  mysqli_query($conn, $sql);

// Close the database connection
  mysqli_close($conn);

  // Get the referer URL
$referer = $_SERVER['HTTP_REFERER'];

// Check if the referer has the "product_id" parameter
if (strpos($referer, 'product_id=') !== false) {
  // If the "product_id" parameter is present, preserve only the "product_id" parameter
  $refererParts = parse_url($referer);
  $newReferer = $refererParts['scheme'] . '://' . $refererParts['host'] . $refererParts['path'] . '?product_id=' . $_GET['product_id'] ;
} else {
  // If the "product_id" parameter is not present, remove all existing parameters
  $newReferer = $referer;
}

// Add success parameter to the URL
$newReferer .= (strpos($newReferer, '?') === false ? '?' : '&') . 'success=The product has been removed from the database';

// Redirect to the new URL
header('Location: ' . $newReferer);
exit();
}
?>
