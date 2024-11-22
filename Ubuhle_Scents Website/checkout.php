<?php
// Start session to retrieve cart data
session_start();

// Sample cart data (replace with session data or database fetch)
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [
    ['id' => 1, 'name' => 'Elegant Blossom', 'price' => 499.99, 'quantity' => 1],
    ['id' => 2, 'name' => 'Mystic Oud', 'price' => 599.99, 'quantity' => 1]
];

// Calculate total
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);

    // Process order (save to database, send email, etc.)
    // For demonstration, let's assume the order is saved
    // After saving, you can clear the cart session
    $_SESSION['cart'] = [];

    // Redirect to thank you or confirmation page
    header('Location: thank_you.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Ubuhle Scents</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            background: white;
            padding: 20px;
            margin-top: 30px;
            width: 90%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .cart-summary {
            margin: 20px 0;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .cart-summary p {
            margin: 5px 0;
        }

        .submit-btn {
            background-color: #ff4081;
            color: white;
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .submit-btn:hover {
            background-color: #f50057;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>

        <!-- Display Cart Summary -->
        <div class="cart-summary">
            <h3>Order Summary</h3>
            <?php foreach ($cart as $item): ?>
                <p><?= htmlspecialchars($item['name']) ?> (x<?= $item['quantity'] ?>): R<?= number_format($item['price'] * $item['quantity'], 2) ?></p>
            <?php endforeach; ?>
            <hr>
            <p><strong>Total:</strong> R<?= number_format($total, 2) ?></p>
        </div>

        <!-- Checkout Form -->
        <form method="POST" action="payment.php">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required placeholder="Enter your full name">

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email address">

            <label for="address">Shipping Address</label>
            <textarea id="address" name="address" required placeholder="Enter your shipping address"></textarea>

             <!-- Submit Button -->
             <button type="submit" class="submit-btn">Confirm Order</button>
        </form>
    </div>
</body>
</html>
