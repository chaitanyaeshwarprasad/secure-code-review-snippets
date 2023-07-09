<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .welcome {
            margin-bottom: 20px;
        }

        .logout-btn {
            background-color: #f44336;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        <form action="logout.php" method="post">
            <input type="submit" value="Logout" class="logout-btn">
        </form>
    </div>
</body>
</html>
