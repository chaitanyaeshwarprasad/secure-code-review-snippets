<?php
session_start();

// Regenerate the session ID to prevent session fixation attacks
session_regenerate_id();

// Connect to the MySQL database
$host = "localhost";
$username = "root";
$password = "";
$database = "shacep"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Insert the user into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['username'] = $username;
    header("Location: profile.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>