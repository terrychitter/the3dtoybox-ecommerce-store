<?php
// Include the database connection
include 'db_conn.php';

// Get form data
$productName = $_POST['product-name'];
$productDesc = $_POST['product-desc'];
$category = $_POST['category'];
$productPrice = $_POST['product-price'];
$new = isset($_POST['new']) ? 1 : 0;
$featured = isset($_POST['featured']) ? 1 : 0;

// Insert item into the database
$sql = "INSERT INTO products (name, description, price, category, new, featured) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdssi", $productName, $productDesc, $productPrice, $category, $new, $featured);
$stmt->execute();

// Get the auto-generated product_id
$productId = $stmt->insert_id;

// Save the image with the appropriate file name
$targetDirectory = "product_images/";
$targetFile = $targetDirectory . $productId . ".png";

echo $targetFile;

if (move_uploaded_file($_FILES['product-img']['tmp_name'], $targetFile)) {
  echo "The item has been added successfully.";
} else {
  echo "Sorry, there was an error uploading your image.";
}

$stmt->close();
$conn->close();

// Get the referer URL
$referer = $_SERVER['HTTP_REFERER'];

// Check if the referer has the "product_id" parameter
if (strpos($referer, 'product_id=') !== false) {
  // If the "product_id" parameter is present, preserve only the "product_id" parameter
  $refererParts = parse_url($referer);
  $newReferer = $refererParts['scheme'] . '://' . $refererParts['host'] . $refererParts['path'] . '?product_id=' . $_GET['product_id'] ;
} else {
  // If the "product_id" parameter is not present, remove all existing parameters
  $newReferer = $referer;
}

// Add success parameter to the URL
$newReferer .= (strpos($newReferer, '?') === false ? '?' : '&') . 'success=Product has been added to the database';

// Redirect to the new URL
header('Location: ' . $newReferer);
exit();
?>
