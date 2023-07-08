<?php
// Assume this is a web application with a user profile feature

// Get the logged-in user's ID from the session or authentication token
$current_user_id = $_SESSION['user_id'];



// Get the user ID from the request
$user_id = $_GET['user_id'];

// Check if the logged-in user is authorized to view this profile
if ($current_user_id == $user_id) {

/* We retrieve the logged-in user's ID from the session or authentication token using $_SESSION['user_id'] and store it in the $current_user_id variable.

Additionally, we obtain the user ID from the request using $_GET['user_id'] and assign it to the $user_id variable. */
	
    // Fetch the user profile from the database
    $profile = fetch_profile($user_id);

    // Display the user profile
    echo "Username: " . $profile['username'] . "<br>";
    echo "Email: " . $profile['email'] . "<br>";
} else {
    echo "Access Denied!";
}
?>
