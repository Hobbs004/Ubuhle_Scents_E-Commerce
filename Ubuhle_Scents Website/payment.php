<?php
// Start session to retrieve cart and user data
session_start();

// Retrieve user details from checkout form
if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['address'])) {
    header("Location: checkout.php");
    exit();
}

$user = [
    'name' => htmlspecialchars($_POST['name']),
    'email' => htmlspecialchars($_POST['email']),
    'address' => htmlspecialchars($_POST['address'])
];
$_SESSION['user'] = $user;

// Retrieve cart data
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Handle payment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_method'])) {
    $payment_method = htmlspecialchars($_POST['payment_method']);
    $_SESSION['payment_method'] = $payment_method;

    // Redirect to thank you page after saving payment method
    header('Location: thank_you.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Ubuhle Scents</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            margin: 0;
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

        h1, h3 {
            text-align: center;
        }

        .cart-summary, .payment-options {
            margin: 20px 0;
        }

        .cart-summary p, .payment-options label {
            margin: 10px 0;
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
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #f50057;
        }

        input[type="radio"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment</h1>

        <!-- Cart Summary -->
        <div class="cart-summary">
            <h3>Order Summary</h3>
            <?php foreach ($cart as $item): ?>
                <p><?= htmlspecialchars($item['name']) ?> (x<?= $item['quantity'] ?>): R<?= number_format($item['price'] * $item['quantity'], 2) ?></p>
            <?php endforeach; ?>
            <hr>
            <p><strong>Total:</strong> R<?= number_format($total, 2) ?></p>
        </div>

        <!-- Payment Options -->
        <form method="POST" action="thank_you.php">
            <div class="payment-options">
                <h3>Choose Payment Method</h3>
                <label>
                    <input type="radio" name="payment_method" value="credit_card" required>
                    Credit/Debit Card
                </label>
                <label>
                    <input type="radio" name="payment_method" value="bank_transfer">
                    Bank Transfer
                </label>
                <label>
                    <input type="radio" name="payment_method" value="cash_on_delivery">
                    Cash on Delivery
                </label>
            </div>

            <button type="submit" class="submit-btn">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>
