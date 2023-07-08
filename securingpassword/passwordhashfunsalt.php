<<?php

//Secured (Passsword Hash Function with salt)
//$password = $_POST['password'];(if it is in the real database)
$password = "Eshwar@123";
$salt = bin2hex(random_bytes(16));
$hash = password_hash($password . $salt, PASSWORD_BCRYPT);
echo $hash;

?>