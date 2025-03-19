<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($email) || empty($password)) {
        $error = "Please fill in all fields!";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Check if email already exists
        $check_query = "SELECT * FROM signup WHERE email = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $result = $check_stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error = "Email already exists!";
        } else {
            // Insert new user
            $insert_query = "INSERT INTO signup (username, email, password) VALUES (?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("sss", $username, $email, $hashed_password);
            
            if ($insert_stmt->execute()) {
                header("Location: login.php");
                exit();
            } else {
                $error = "Registration failed!";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>LOG IN</h2>
        <?php if(isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" placeholder="Enter New Username" required>
            <input type="email" name="email" placeholder="Enter Your Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm password" required>
            <button type="submit">SIGN UP</button>
        </form>
        <div class="links">
            <a href="#">Forgot Password?</a>
            <a href="login.php">You  have an account? Sign in</a>
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

