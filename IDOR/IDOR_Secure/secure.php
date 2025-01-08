<?php
// secure.php
session_start();  // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to view this page.");
}

// Database connection
$host = "localhost";
$dbname = "acepidor";
$username = "root";  // Change as necessary
$password = "";      // Change as necessary

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user ID from the URL
$user_id = $_GET['id'];

// Check if the logged-in user is trying to access their own data
if ($_SESSION['user_id'] != $user_id) {
    die("Access Denied: You can only view your own information.");
}

// Fetch the user details from the database
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>User Info</h2>";
    echo "Username: " . $row['username'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
} else {
    echo "No user found with that ID.";
}

$conn->close();
?>
