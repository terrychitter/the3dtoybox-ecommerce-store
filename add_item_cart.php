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
    $newReferer .= '?error=Sign in or Create an Account to add items to your Cart';
    
    // Redirect to the new URL
    header('Location: ' . $newReferer);
    exit();
    }
    

// Removing the item from the user's cart
$id = $_SESSION['id'];
$productID = $_GET['product_id'];

require_once 'db_conn.php';

$sql = "INSERT INTO cart_items (product_id, user_id, quantity) VALUES ($productID, $id, 1)";
mysqli_query($conn, $sql);

//Add the item to the sesion cart
$_SESSION['cart'][] = $productID;

// Remove the item from the user's wishlist
$sql = "DELETE FROM wish_list_items WHERE product_id = '$productID' AND user_id = '$id'";
mysqli_query($conn, $sql);

//Remove the item from the session wishlist
$index = array_search($productID, $_SESSION['wishlist']);
unset($_SESSION['wishlist'][$index]);

// Go back to the store page
// Get the referer URL
$referer = $_SERVER['HTTP_REFERER'];

// Remove existing parameters from the URL
$refererParts = parse_url($referer);
$newReferer = $refererParts['scheme'] . '://' . $refererParts['host'] . $refererParts['path'];

// Add success parameter to the URL
$newReferer .= '?success=Your item has been added to the cart';

// Redirect to the new URL
header('Location: ' . $newReferer);
exit();
?>