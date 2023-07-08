<?php

//Secured Code (Password Hash Function with Verification)

//$password = $_POST['password'];(if it is in the real database)
$password = "Eshwar@123";
$hash = password_hash($password, PASSWORD_BCRYPT);
echo $hash;
if (password_verify("Eshwar@123" ,$hash)) {
    echo "<br>password is verified";
}
else
{
	echo "<br>Password id Not Verified";
}

?>