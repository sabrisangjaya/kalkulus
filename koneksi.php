<?php
$host = "localhost";
// $user = "root";
// $password = "";
// $dbname = "kalkulustoko";

$user = "id3081553_sabri";
$password = "sabri123";
$dbname = "id3081553_kalkulustoko";

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
?>