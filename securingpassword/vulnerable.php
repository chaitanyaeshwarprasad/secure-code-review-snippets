<?php

//Vulnerable Code
//$password = $_POST['password'];(if it is in the real database)
$password = "Eshwar@123"
echo md5($password)

?>