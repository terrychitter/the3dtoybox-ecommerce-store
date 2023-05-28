<?php 
session_start();

// Returning an error if an account is not logged in
if (!isset($_SESSION['id'])) {
// Go back to the store page
// Get the referer URL
$referer = $_SERVER['HTTP_REFERER'];

// Remove existing parameters from the URL
$refererParts = parse_url($referer);
$newReferer = $refererParts['scheme'] . '://' . $refererParts['host'] . $refererParts['path'];

// Add success parameter to the URL
$newReferer .= '?error=Sign in or Create an Account to add items to your Wishlist';

// Redirect to the new URL
header('Location: ' . $newReferer);
exit();
}

// Removing the item from the user's wishlist
$id = $_SESSION['id'];
$productID = $_GET['product_id'];

require_once 'db_conn.php';

$sql = "INSERT INTO wish_list_items (product_id, user_id) VALUES ($productID, $id)";
mysqli_query($conn, $sql);

//Add the item from the sesion wishlist
$_SESSION['wishlist'][] = $productID;

// Go back to the store page
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
$newReferer .= (strpos($newReferer, '?') === false ? '?' : '&') . 'success=Your item has been added to the wishlist';

// Redirect to the new URL
header('Location: ' . $newReferer);
exit();

?>