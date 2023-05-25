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
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>