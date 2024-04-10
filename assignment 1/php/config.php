<?php
$servername = "localhost";
$username = "root"; // Default MySQL username in XAMPP
$password = "";     // Default MySQL password in XAMPP (empty)
$database = "db";   // Name of the database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
