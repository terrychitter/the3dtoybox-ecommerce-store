<?php

session_start();
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validateInputs($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$email = validateInputs($_POST['email']);
$password = validateInputs($_POST['password']);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "Error: " . mysqli_error($conn);
} else {
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $password) {
            echo "Logged In!";
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['user_id'];
            header('Location: shop/shop.php');
            exit();
        } else  {
            header("Location: sign-in/sign-in.html?error=Incorrect Username or Password");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
}
?>