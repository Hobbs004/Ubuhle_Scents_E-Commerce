<?php
session_start();

// Retrieve user details and payment method
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
$payment_method = isset($_SESSION['payment_method']) ? $_SESSION['payment_method'] : 'Unknown';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Ubuhle Scents</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
        }

        h1 {
            color: #333;
        }

        p {
            margin: 20px 0;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #ff4081;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #f50057;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You!</h1>
        <p>Your order has been successfully placed.</p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars(isset($user['name']) ? $user['name'] : 'Unknown'); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars(isset($user['email']) ? $user['email'] : 'Unknown'); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars(isset($user['address']) ? $user['address'] : 'Unknown'); ?></p>
        <a href="dashboard.php">Return to Dashboard</a>
        <a href="track.php">Track your Order</a>
    </div>
</body>
</html>
