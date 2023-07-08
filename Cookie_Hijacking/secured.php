//Secure Code for Cookie Hijacking

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
        $session_token = generate_session_token($entered_username);

        // Store the session token in a cookie with secure and httponly flags
        setcookie('session_token', $session_token, time() + 3600, '/', '', true, true); // 1 hour expiration, secure, httponly

// 'session_token': This is the name of the cookie. In this case, it represents the session token.

// $session_token: This variable holds the generated session token value.

// time() + 3600: This sets the expiration time for the cookie. time() returns the current timestamp, and adding 3600 (1 hour in seconds) ensures that the cookie will expire after 1 hour.

// '/': This specifies the path on the server where the cookie is valid. Using '/' makes the cookie valid for the entire domain.

// '': This parameter represents the domain for which the cookie is valid. An empty string indicates that the cookie is valid for the current domain.

// true: This enables the 'secure' flag for the cookie. When set to true, the cookie will only be transmitted over a secure HTTPS connection, adding an extra layer of protection.

// true: This enables the 'httponly' flag for the cookie. When set to true, the cookie will be inaccessible to JavaScript, reducing the risk of cross-site scripting (XSS) attacks.

        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid credentials.";
    }
}

function generate_session_token($username) {
    // Generate a random session token using a combination of username and some random data
    $random_data = bin2hex(random_bytes(16));
    return md5($username . $random_data);
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
    </