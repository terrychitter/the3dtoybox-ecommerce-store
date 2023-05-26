<?php 
session_start();

// Removing the item from the user's cart
$id = $_SESSION['id'];
$productID = $_GET['product_id'];
echo "ProductID: ".$productID;
 require_once 'db_conn.php';

 $sql = "DELETE FROM cart_items WHERE product_id = '$productID' AND user_id = '$id'";
 mysqli_query($conn, $sql);

 //Remove the item from the sesion cart
 $index = array_search($productID, $_SESSION['cart']);
 unset($_SESSION['cart'][$index]);

 // Go back to the previous page
// Get the referer URL
$referer = $_SERVER['HTTP_REFERER'];

// Remove existing parameters from the URL
$refererParts = parse_url($referer);
$newReferer = $refererParts['scheme'] . '://' . $refererParts['host'] . $refererParts['path'];

// Add success parameter to the URL
$newReferer .= '?success=Your item has been removed from the cart';

// Redirect to the new URL
header('Location: ' . $newReferer);
 exit();
?>