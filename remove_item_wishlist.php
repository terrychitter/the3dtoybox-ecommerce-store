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
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>