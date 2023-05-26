<?php
session_start();

// Store the variables from GET
$total = $_GET['bill_total'];
$product_ids = $_GET['product_ids'];

// Require the database connection
require_once "db_conn.php";

// Insert order into the orders table
$user_id = $_SESSION['id'];
$order_date = date('Y-m-d H:i:s');

// Prepare the SQL statement
$sql = "INSERT INTO orders (user_id, order_date, total) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $user_id, $order_date, $total);

// Execute the statement
$stmt->execute();

// Get the auto-incremented order_id
$order_id = $stmt->insert_id;

// Insert products into the order_items table
foreach ($product_ids as $product_id) {
  // Prepare the SQL statement
  $sql = "INSERT INTO order_items (order_id, product_id) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $order_id, $product_id);

  // Execute the statement
  $stmt->execute();
}

// Empty the SESSION array called cart
$_SESSION['cart'] = array();

// Remove records from the cart_items table where user_id = $user_id
$sql = "DELETE FROM cart_items WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

// Close the statement and database connection
$stmt->close();
$conn->close();

echo "Order Successful";
?>
