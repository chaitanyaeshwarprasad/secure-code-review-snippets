<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chaitanya Eshwar Prasad Directory Traversal Lab</title>
</head>
<body>
<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'home.php';
    }
    include($page);
?>

<a href="index.php?page=home.php">ACEP Home Page</a><br>
<a href="index.php?page=about.php">ACEP About Page</a><br>
<a href="index.php?page=contact.php">ACEP Contact Page</a><br>
</body>
</html>
