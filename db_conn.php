<?php

$db_sname = "localhost";
$db_uname = "root";
$db_pass = "";

$db_name = "the3dtoybox";

$conn = mysqli_connect($db_sname, $db_uname, $db_pass, $db_name);

if (!$conn) {
    echo "Connection to the database has failed.";
}
?>