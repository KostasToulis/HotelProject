<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hotel";

//$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

session_start();

?>