<?php

// Check if the logged-in user is authorized to view this profile
if ($current_user_id == $user_id) {

    // Fetch the user profile from the database
    $profile = fetch_profile($user_id);

    // Display the user profile
    echo "Username: " . $profile['username'] . "<br>";
    echo "Email: " . $profile['email'] . "<br>";
} else {
    echo "Access Denied!";
}


?>