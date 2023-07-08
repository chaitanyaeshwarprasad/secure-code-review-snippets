<?php

// Disable error reporting (not recommended for production)
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL)
ini_set("error_reporting", E_ALL);

// Report all errors except notices
error_reporting(E_ALL & ~E_NOTICE);

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

ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors','Off');
ini_set('log_errors', 'On');
ini_set('error_log','C:/xampp/apache/logs/error');

?>