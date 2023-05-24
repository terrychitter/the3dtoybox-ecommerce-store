<?php

session_start();

if (!isset($_POST)) {
    header("Location: myaccount.php");
    exit();
} else {

    // Update the user's information
    $email = $_SESSION['email'];
    $oldHouseNo = $_SESSION['house_no'];
    $oldStreetName = $_SESSION['street_name'];
    $oldSuburb = $_SESSION['suburb'];
    $oldCity = $_SESSION['city'];
    $oldProvince = $_SESSION['province'];
    $oldPostal = $_SESSION['postal'];


    $newHouseNo = $_POST['house-number'];
    $newStreetName = $_POST['street-name'];
    $newSuburb = $_POST['suburb'];
    $newCity = $_POST['city'];
    $newProvince = $_POST['province'];
    $newPostal = $_POST['postal-code'];

    require_once "../db_conn.php";

    // Updating the user's email
    $sql = "UPDATE users
    SET house_number = '$newHouseNo',
        street_name = '$newStreetName',
        suburb = '$newSuburb',
        city = '$newCity',
        province = '$newProvince',
        postal_code = '$newPostal'
    WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);

    // Setting the session variables
    $_SESSION['house_no'] = $newHouseNo;
    $_SESSION['street_name'] = $newStreetName;
    $_SESSION['suburb'] = $newSuburb;
    $_SESSION['city'] = $newCity;
    $_SESSION['province'] = $newProvince;
    $_SESSION['postal'] = $newPostal;

    header("Location: myaccount.php?status=address updated");
    exit();
}