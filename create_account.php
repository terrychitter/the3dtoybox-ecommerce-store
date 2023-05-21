<?php

session_start();
require_once "db_conn.php";

if (isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])) {

    // Helper functions to validate and sanitize the inputs
    function validateInputs($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validating the inputs
    $username = validateInputs($_POST['username']);
    $phone = validateInputs($_POST['phone']);
    $email = validateInputs($_POST['email']);
    $password = trim($_POST['password']);

    //Hashing the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //Checking if email or phone number already exists
    $sql = "SELECT * FROM users WHERE email='$email' OR contact_number='$phone'";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "Error: "/mysqli_error($conn);
    } else if (mysqli_num_rows($result) >= 1) {
        header("Location: sign-up/sign-up.php?error=Email or Phone number already in use");
    } else {
        // Adding the user into the database
        $sql = "INSERT INTO users (username, contact_number, email, password) VALUES ('$username', '$phone', '$email', '$hashedPassword')";
        $result = mysqli_query($conn, $sql);

        if ($result === false) {
            echo "Error: " . mysqli_error($conn);
        } else {
            $_SESSION['id'] = mysqli_insert_id($conn);
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['phone'] = '';
            $_SESSION['house_no'] = '';
            $_SESSION['street_name'] = '';
            $_SESSION['suburb'] = '';
            $_SESSION['city'] = '';
            $_SESSION['province'] = '';
            $_SESSION['postal'] = '';
            $_SESSION['orders'] = array();
            $_SESSION['cart'] = array();
            $_SESSION['wishlist'] = array();

            header('Location: shop/shop.php');
            exit();
        }
        }
} else {
    header("Location: index.php?error=Unepected Error Occured");
    exit();
}
?>
