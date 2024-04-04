<?php
// Database connection settings
$servername = "localhost"; // Change this to your database host
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "lodge"; // Change this to your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the connection is successful, you can use the $conn variable to perform database operations.
