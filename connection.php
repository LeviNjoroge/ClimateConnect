<?php
// method -
//connect to server -
// take front end data -
// push  to db
//close connection

// Database configuration
$server = 'localhost';
$username = "root";
$password = "dency1234.";
$database = "climateconnect";

// Create connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Don't echo connection status in production
// echo "connection successful";

// Don't process POST data here - move it to signup.php
?>