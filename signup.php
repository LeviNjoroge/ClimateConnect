<?php
session_start();
require_once 'connection.php'; // Changed to require_once

// Create database if not exists
$dbCheck = $conn->query("SHOW DATABASES LIKE '$dbname'");
if ($dbCheck->num_rows == 0) {
    $conn->query("CREATE DATABASE $dbname");
}

// Select database
$conn->select_db($dbname);

// Create table if not exists
$tableCheck = $conn->query("SHOW TABLES LIKE 'users'");
if ($tableCheck->num_rows == 0) {
    $sql = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->query($sql);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $username = $conn->real_escape_string($_POST["username"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (first_name, last_name, username, email, password) 
            VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Sign-up successful! <a href='login.html'>Login here</a>";
        // call the index.html page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>LOG IN</h2>
        <form action="signup.php" method="POST">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">SIGN UP</button>
        </form>        
        <div class="links">
            <a href="#">Forgot Password?</a>
            <a href="login.html">You  have an account? Sign in</a>
            <p>Continue with:</p>
            <button class="google">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google logo"> 
                Sign in with Google
            </button>
            <button class="facebook">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" alt="Facebook logo"> 
                Sign in with Facebook
            </button>
        </div>
    </div>
</body>
</html>



