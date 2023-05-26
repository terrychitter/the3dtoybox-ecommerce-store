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
 header('Location: ' . $_SERVER['HTTP_REFERER']);
 exit();
?>