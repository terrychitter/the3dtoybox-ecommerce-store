<?php
session_start();
require_once "db_conn.php";

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
                $_SESSION['phone'] = $row['contact_number'];
                $_SESSION['house_no'] = $row['house_number'];
                $_SESSION['street_name'] = $row['street_name'];
                $_SESSION['suburb'] = $row['suburb'];
                $_SESSION['city'] = $row['city'];
                $_SESSION['province'] = $row['province'];
                $_SESSION['postal'] = $row['postal_code'];

                // Retrieving orders from the database
                $sql  = "SELECT order_id FROM orders WHERE user_id='{$_SESSION['id']}'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $orders = array();

                    // Populating the orders array with order ids
                    while ($row = mysqli_fetch_assoc($result)) {
                        $orders[] = $row['order_id'];
                    }

                    // Assigning the orders array to the orders session variable
                    $_SESSION['orders'] = $orders;
                    mysqli_free_result($result);
                }

                // Retrieving cart items from the database
                $sql = "SELECT product_id FROM cart_items WHERE user_id = '{$_SESSION['id']}'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $cart_items = array();

                    // Populating the cart_items array with cart item ids
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cart_items[] = $row['product_id'];
                    }

                    // Assigning the cart items array to the cart session variable
                    $_SESSION['cart'] = $cart_items;

                    // Free the result set
                    mysqli_free_result($result);
                }

                // Retrieve wishlist items from the database
                $sql = "SELECT product_id FROM wish_list_items WHERE user_id = '{$_SESSION['id']}'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $wishlist_items = array();

                    // Populating the wishlist_items array with wishlist item ids
                    while ($row = mysqli_fetch_assoc($result)) {
                        $wishlist_items[] = $row['product_id'];
                    }

                    // Assigning the wishlist array to the wishlist session variable
                    $_SESSION['wishlist'] = $wishlist_items;

                    // Free the result set
                    mysqli_free_result($result);
                }
                
                mysqli_close($conn);
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
