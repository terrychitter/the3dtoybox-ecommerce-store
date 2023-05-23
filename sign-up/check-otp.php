<?php

require_once "../db_conn.php";

session_start();

// Checking if otp is correct
if (isset($_POST)) {
    $code = $_POST['otp'];
    $email = $_SESSION['email'];

    // Checking if the code matches that in the database
    $sql = "SELECT otp FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "Error: " . mysqli_error($conn);
    } else {

        // Get row
        $row = mysqli_fetch_assoc($result);

        // Checking if the code matches that in the database
        if ($row["otp"] === $code) {

            // Set the account to verified
            $sql = "UPDATE users SET verified = true, otp = 0 WHERE email = '$email'";
            mysqli_query($conn, $sql);
            header('Location: ../index.php');
            exit();
        } else {
            // Show error
            header('Location: otp-verif.php?error=Incorrect OTP number');
        }
    }
}
?>
