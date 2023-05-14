<?php

session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])) {

    function validateInputs($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validateInputs($_POST['username']);
    $phone = validateInputs($_POST['phone']);
    $email = validateInputs($_POST['email']);
    $password = validateInputs($_POST['password']);

    $sql = "INSERT INTO users (username, contact_number, email, password) VALUES ('$username', '$phone', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "Error: " . mysqli_error($conn);
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['id'] = mysqli_insert_id($conn);
        header('Location: shop/shop.php');
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
