<?php 
session_start();

// Removing the item from the user's wishlist
$id = $_SESSION['id'];
$productID = $_GET['product_id'];

require_once 'db_conn.php';

$sql = "DELETE FROM wish_list_items WHERE product_id = '$productID' AND user_id = '$id'";
mysqli_query($conn, $sql);

//Remove the item from the sesion wishlist
$index = array_search($productID, $_SESSION['wishlist']);
unset($_SESSION['wishlist'][$index]);

// Go back to the previous page
// Get the referer URL
$referer = $_SERVER['HTTP_REFERER'];

// Check if the referer has the "product_id" parameter
if (strpos($referer, 'product_id=') !== false) {
  // If the "product_id" parameter is present, preserve only the "product_id" parameter
  $refererParts = parse_url($referer);
  $newReferer = $refererParts['scheme'] . '://' . $refererParts['host'] . $refererParts['path'] . '?product_id=' . $_GET['product_id'];
} else {
  // If the "product_id" parameter is not present, remove all existing parameters
  $newReferer = $referer;
}

// Add success parameter to the URL
$newReferer .= (strpos($newReferer, '?') === false ? '?' : '&') . 'success=Your item has been removed from the wishlist';

// Redirect to the new URL
header('Location: ' . $newReferer);
exit();

?>