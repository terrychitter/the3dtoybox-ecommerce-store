<?php 
session_start();

// Removing the item from the user's cart
$id = $_SESSION['id'];
$productID = $_GET['product_id'];

require_once 'db_conn.php';

$sql = "INSERT INTO cart_items (product_id, user_id, quantity) VALUES ($productID, $id, 1)";
mysqli_query($conn, $sql);

//Add the item from the sesion cart
$_SESSION['cart'][] = $productID;

// Remove the item from the user's wishlist
$sql = "DELETE FROM wish_list_items WHERE product_id = '$productID' AND user_id = '$id'";
mysqli_query($conn, $sql);

//Remove the item from the sesion wishlist
$index = array_search($productID, $_SESSION['wishlist']);
unset($_SESSION['wishlist'][$index]);

// Go back to the store page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>