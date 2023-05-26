<?php 
session_start();

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

// Remove existing parameters from the URL
$refererParts = parse_url($referer);
$newReferer = $refererParts['scheme'] . '://' . $refererParts['host'] . $refererParts['path'];

// Add success parameter to the URL
$newReferer .= '?success=Your item has been added to the wishlist';

// Redirect to the new URL
header('Location: ' . $newReferer);
exit();
?>