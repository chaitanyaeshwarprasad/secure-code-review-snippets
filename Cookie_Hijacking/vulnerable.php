//Vulnerable Code for Cookie Session Hijacking 

<?php
session_start();

// Hard-coded username and password for simplicity
$username = "admin";
$password = "password";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    if ($entered_username === $username && $entered_password === $password) {
        // User is authenticated, create a session
        $session_token = md5($username);

        // Store the session token in a cookie
        setcookie('session_token', $session_token, time() + 3600); // 1 hour expiration

        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
