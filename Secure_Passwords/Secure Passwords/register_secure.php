<?php
include('acepdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password before storing (secure)
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "New user registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="register_secure.php">
    <label for="username">Username:</label><br>
    <input type="text" name="username" required><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" name="password" required><br><br>
    
    <button type="submit">Register</button>
</form>
