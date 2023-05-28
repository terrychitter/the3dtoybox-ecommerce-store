<?php

session_start();

if (!isset($_POST)) {
    header("Location: myaccount.php");
    exit();
} else {

    // Update the user's information
    $oldEmail = $_SESSION['email'];
    $oldPhone = $_SESSION['phone'];
    $newEmail = $_POST['email'];
    $newPhone = $_POST['contact-number'];
    $id = $_SESSION['id'];

    // Check if email or contact number is not already in use
    require_once "../db_conn.php";

    $sql = "SELECT * FROM users WHERE email='$newEmail' AND user_id <> $id";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "Error: "/mysqli_error($conn);
    } else if (mysqli_num_rows($result) >= 1) {
        header("Location: myaccount.php?error=Email in use");
        exit();
    }

    $sql = "SELECT * FROM users WHERE contact_number='$newPhone' AND email <> '$oldEmail'";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "Error: "/mysqli_error($conn);
    } else if (mysqli_num_rows($result) >= 1) {
        header("Location: myaccount.php?error=Contact number in use");
        exit();
    }

    // Updating the user's email
    $sql = "UPDATE users SET email = '$newEmail' WHERE email = '$oldEmail'";
    $result = mysqli_query($conn, $sql);
    $_SESSION['email'] = $newEmail;

    // Updating the user's phone number
    $sql = "UPDATE users SET contact_number = '$newPhone' WHERE contact_number = '$oldPhone'";
    $result = mysqli_query($conn, $sql);
    $_SESSION['phone'] = $newPhone;

    header("Location: myaccount.php?success=personal updated");
    exit();
}