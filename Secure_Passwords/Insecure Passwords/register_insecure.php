<?php
include('acepdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Store password in plain text (insecure)
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New user registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="register_insecure.php">
    <label for="username">Username:</label><br>
    <input type="text" name="username" required><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" name="password" required><br><br>
    
    <button type="submit">Register</button>
</form>
