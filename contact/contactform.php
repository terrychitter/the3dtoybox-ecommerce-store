<?php 

if (isset($_POST['submit'])) {
    
    // Sanitize the email, name, subject, and message variables
    $name = sanitizeInput($_POST['name']);
    $mailFrom = sanitizeEmail($_POST['email']);
    $subject = sanitizeInput($_POST['reason']);
    $message = sanitizeInput($_POST['message']);

    $mailTo = "support@the3dtoybox.com";
    $headers = "From: ".$mailFrom;
    $txt = "You have recieved an email from".$name.".\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: ../index.php?mailsend");

}

// Function to sanitize input data
function sanitizeInput($input) {
    // Remove leading and trailing whitespaces
    $input = trim($input);
    // Remove backslashes
    $input = stripslashes($input);
    // Convert special HTML characters to their respective entities
    $input = htmlspecialchars($input);
    return $input;
}

// Function to sanitize email address
function sanitizeEmail($email) {
    // Remove leading and trailing whitespaces
    $email = trim($email);
    // Remove backslashes (\)
    $email = stripslashes($email);
    // Remove unknown characters from the email address
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return $email;
}