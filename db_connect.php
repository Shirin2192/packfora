<?php
// db_connect.php

// Database credentials
$servername = "localhost";
$username = "root"; // <-- Change this to your actual database username
$password = "";
$dbname = "db_packfora"; // <-- Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
