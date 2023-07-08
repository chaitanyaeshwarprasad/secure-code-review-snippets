<?php

//Error Handling
error_reporting(0);


$servername = "localhost";
$username = "fake_username";
$password = "fake_password";
$dbname = "acep_database";  

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
