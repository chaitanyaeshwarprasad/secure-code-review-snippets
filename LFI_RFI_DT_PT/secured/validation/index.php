<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chaitanya Eshwar Prasad Directory Traversal Lab</title>
</head>
<body>
<?php
    //Error Handling for hiding the errors
    error_reporting(0);
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'home';
    }

// Prevent path traversal by removing periods and slashes (Validation)
     //Remove .php 

/* In this line, the str_replace function is used to replace periods (".") and slashes ("/") in the $page variable with a space (' '). So instead of removing these characters completely, they are substituted with spaces. This change from empty string to space might be intended to preserve the basic structure of the path while avoiding directory traversal.The code then attempts to read the contents of a file by concatenating the ./ string (representing the current directory) with the modified value of $page and .php. It uses the file_get_contents function to read the contents of that file and echo them to the output. */

    $page = str_replace(array('.', '/'), ' ', $page);
    echo file_get_contents('./'.$page.'.php');
    include($page);
?>
 
<a href="index.php?page=home">ACEP Home Page</a><br>
<a href="index.php?page=about">ACEP About Page</a><br>
<a href="index.php?page=contact">ACEP Contact Page</a><br>
</body>
</html>
