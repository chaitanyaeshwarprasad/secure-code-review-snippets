<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chaitanya Eshwar Prasad Directory Traversal Lab</title>
</head>
<body>
<?php

//Prevent path traversal by Whitelisting method

/*
Whitelisting: The code uses a whitelist approach by defining the $allowedPages array. This array contains the filenames of the pages that are considered safe and allowed to be included. Only if the requested page ($page) is found within the $allowedPages array, it will be included. Otherwise, an invalid page error is displayed.
*/

    $allowedPages = [
        'home.php',
        'about.php',
        'contact.php'
    ];

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if (in_array($page, $allowedPages)) {
            include($page);
        } else {
            echo "Invalid page requested.";
        }
    } else {
        include('home.php');
    }
?>

<a href="index.php?page=home.php">ACEP Home Page</a><br>
<a href="index.php?page=about.php">ACEP About Page</a><br>
<a href="index.php?page=contact.php">ACEP Contact Page</a><br>
</body>
</html>
