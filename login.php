<?php
session_start();
include_once "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validateInputs($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cleaning up the inputs
    $email = validateInputs($_POST['email']);
    $password = trim($_POST['password']);

    // Searching for the user in the database using the email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "Error: " . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            // Checking if the password matches with the email. Passwords are encoded, thus, the use of password_verify()
            if (password_verify($password, $row['password'])) {
                echo "Logged In!";
    
                // Defining the session for the user
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['user_id'];
                header('Location: shop/shop.php');
    
                exit();
            } else {
                // If the password does not match
                header("Location: sign-in/sign-in.php?error=Incorrect Username or Password");
                exit();
            }
        } else {
            //If no record of the email was found in the database
            header("Location: sign-in/sign-in.php?error=Incorrect Username or Password");
            exit();
        }
    }
}
?>
