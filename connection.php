<?php
$host = "127.0.0.1";
$username = "root";
$password = "1234fin!";
$database = "soho";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

