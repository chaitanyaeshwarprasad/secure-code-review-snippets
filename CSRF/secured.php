<?php
//Secured CSRF Code
// Generate CSRF token and store it in the session
session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verify the CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed!");
    }

    // Retrieve the username, email, and phone number from the form submission
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Process the form data or perform any desired operations
    // ...

    // Example: Display a success message with the submitted data
    echo "Username submitted: " . $username . "<br>";
    echo "Email submitted: " . $email . "<br>";
    echo "Phone number submitted: " . $phone . "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone" required>
        <br><br>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

