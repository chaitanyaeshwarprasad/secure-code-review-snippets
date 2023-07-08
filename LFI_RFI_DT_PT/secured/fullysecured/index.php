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

// Prevent path traversal (Validation and whitelisting)

    $page = str_replace(array('.', '/'), ' ', $page);
    echo file_get_contents('./'.$page.'.php');
    $allowedPages = ['home','about','contact'];
    $page = (in_array($page,$allowedPages));
    include($page);
?>
 
<a href="index.php?page=home">ACEP Home Page</a><br>
<a href="index.php?page=about">ACEP About Page</a><br>
<a href="index.php?page=contact">ACEP Contact Page</a><br>
</body>
</html>
