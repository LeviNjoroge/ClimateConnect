
<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = "dency1234."; // Default password is empty
$dbname = "climateconnect";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful (Don't echo this in production)
// echo "Connection successful";
?>
