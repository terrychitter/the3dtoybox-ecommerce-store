<?php

require_once("../config/db_credentials.php");

$conn = mysqli_connect($db_sname, $db_uname, $db_pass, $db_name);

if (!$conn) {
    echo "Connection to the database has failed.";
}
?>