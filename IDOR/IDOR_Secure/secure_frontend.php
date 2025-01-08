<?php
// secure_frontend.php
session_start();  // Start the session

// Simulate a logged-in user (this can be dynamic in a real app)
$_SESSION['user_id'] = 1;  // Simulate Chaitanya is logged in

$host = "localhost";
$dbname = "acepidor";
$username = "root";  // Change as necessary
$password = "";      // Change as necessary

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Users List</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>";
        echo "Username: " . $row['username'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "<a href='secure.php?id=" . $row['id'] . "'>View Details</a><br>";
        echo "</p>";
    }
} else {
    echo "No users found.";
}

$conn->close();
?>
