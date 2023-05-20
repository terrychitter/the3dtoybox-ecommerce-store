<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize the email, name, subject, and message variables
    $name = sanitizeInput($_POST['name']);
    $mailFrom = sanitizeEmail($_POST['email']);
    $subject = sanitizeInput($_POST['reason']);
    $message = sanitizeInput($_POST['message']);

    $mailTo = "support@the3dtoybox.com";
    $headers = "From: " . $mailFrom;
    $txt = "You have received an email from " . $name . ".\n\n" . $message;

    if (mail($mailTo, $subject, $txt, $headers)) {
        echo 'Email Sent';
    } else {
        echo "Email NOT sent";
    }
    header("Location: email-success.html");
} else {
    echo "Form was not submitted";
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

 ?>