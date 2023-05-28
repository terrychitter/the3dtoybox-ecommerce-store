<?php

session_start();

if (!isset($_POST)) {
    header("Location: myaccount.php");
    exit();
} else {

    // Update the user's information
    $email = $_SESSION['email'];
    $oldUsername = $_SESSION['username'];
    $newUsername = $_GET['username'];


    // Check if email or contact number is not already in use
    require_once "../db_conn.php";

    // Updating the user's email
    $sql = "UPDATE users SET username = '$newUsername' WHERE email = '$email'";

    if (mysqli_query($conn, $sql) === false) {
        echo "Error: ".mysqli_error($conn);
    } else {
        $_SESSION['username'] = $newUsername;

        header("Location: myaccount.php?success=username updated");
        exit();
    }
}