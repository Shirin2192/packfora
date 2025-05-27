<?php
// db_connect.php

// Database credentials
$servername = "localhost";
$username = "fsrqglou_db_packfora";
$password = "KEGN!Qi_C!yT";
$dbname = "fsrqglou_db_packfora"; // <-- Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
