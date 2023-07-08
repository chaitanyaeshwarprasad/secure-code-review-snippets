<?php
//CSRF Vulnerable Code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        <input type="submit" value="Submit">
    </form>
</body>
</html>