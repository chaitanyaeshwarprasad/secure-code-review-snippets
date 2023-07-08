<?php

//Secured (Password Hash Function)
//$password = $_POST['password'];(if it is in the real database)
$password = "Eshwar@123";
$hash = password_hash($password, PASSWORD_BCRYPT)
echo $hash;

?>