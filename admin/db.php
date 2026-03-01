<?php
// // for server
// $host = "";
// $user = "";     // change if needed
// $pass = "";         // change if needed
// $db   = "vishal";

$host = "localhost";
$user = "root";     // change if needed
$pass = "";         // change if needed
$db   = "vishal";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
?>
