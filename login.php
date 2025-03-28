<?php
session_start();
require_once 'connection.php'; // Ensure connection file is correctly included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = trim($_POST['email']); // Can be email or username
    $password = $_POST['password'];

    if (empty($input) || empty($password)) {
        $error = "Please fill in all fields!";
    } else {
        // Query to check if input matches an email or username
        $query = "SELECT * FROM users WHERE email = ? OR username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $input, $input); // Bind user input correctly
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Store session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php"); // Redirect to a session-enabled page
                exit();
            } else {
                $error = "Invalid password!";
            }
        } else {
            $error = "User not found!";
        }
    }
}
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
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="email" placeholder="Email or Username" required> <!-- Accept both email & username -->
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">LOG IN</button>
        </form>
        <div class="links">
            <a href="#">Forgot Password?</a>
            <a href="signup.php">Don't have an account? Sign Up</a>
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
