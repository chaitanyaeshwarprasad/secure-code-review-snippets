<?php
include('acepdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password against the hashed password in the database (secure)
        if (password_verify($password, $row['password'])) {
            echo "Login successful!";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Username not found.";
    }

    $conn->close();
}
?>

<form method="POST" action="login_secure.php">
    <label for="username">Username:</label><br>
    <input type="text" name="username" required><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" name="password" required><br><br>
    
    <button type="submit">Login</button>
</form>
