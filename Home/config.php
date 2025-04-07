<?php
// Database configuration
$host = "localhost";
$username = "root";        // Change to your MySQL username
$password = "";            // Change to your MySQL password
$database = "wobble_lab";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>