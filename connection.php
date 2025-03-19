<?php
// method -
//connect to server -
// take front end data -
// push  to db
//close connection

// Database configuration
$servername = "localhost";
$username = "root"; // Default for XAMPP
$password = "0000"; // Default is empty
$dbname = "ClimateConnect";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Don't echo connection status in production
// echo "connection successful";

// Don't process POST data here - move it to signup.php
?>