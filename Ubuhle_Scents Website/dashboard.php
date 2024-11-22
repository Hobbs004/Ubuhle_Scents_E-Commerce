<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Set a fallback if fullname is not set
$fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ubuhle Scents</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .welcome {
            text-align: center;
            margin-bottom: 20px;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #ff4081;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }
        .button:hover {
            background-color: #e7356c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Ubuhle Scents</h1>
        <div class="welcome">
            <p>Hello, <?php echo htmlspecialchars($fullname); ?>!</p>
            <p>What would you like to do today?</p>
        </div>
        <div class="button-group">
            <a href="index.php" class="button">Go to Homepage</a>
            <a href="profile.php" class="button">View Profile</a>
            <a href="shop.php" class="button">Shop Products</a>
            <a href="logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>