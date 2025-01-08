<?php
// vulnerable.php
$host = "localhost";
$dbname = "acepidor";
$username = "root";  // Change as necessary
$password = "";      // Change as necessary

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user ID from the URL
$user_id = $_GET['id'];

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
