<?php
// Include necessary files for database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a unique token for password reset
        $token = bin2hex(random_bytes(50));

        // Insert token into the password_resets table
        $sql = "INSERT INTO password_resets (email, token) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();

        // Send email with reset link (you need to configure mail settings for this to work)
        $reset_link = "http://yourwebsite.com/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: $reset_link";
        $headers = "From: no-reply@yourwebsite.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "An email with password reset instructions has been sent to $email.";
        } else {
            echo "Failed to send email. Please try again later.";
        }
    } else {
        echo "No account found with that email address.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Ubuhle Scents</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .container {
            width: 90%;
            max-width: 500px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        .container h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin: 15px 0;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #ff4081;
        }
        .button-group {
            text-align: center;
        }
        .button {
            background-color: #ff4081;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #e6005c;
        }
        .homepage-link {
            text-align: center;
            margin-bottom: 20px;
        }
        .homepage-link a {
            color: #ff4081;
            text-decoration: none;
            font-size: 16px;
        }
        .homepage-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="homepage-link">
        <a href="index.php">Go to Homepage</a>
    </div>
    <h2>Forgot Password</h2>
    <p>Enter your email address below to receive password reset instructions.</p>
    <form action="forgot_password.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="button-group">
            <button type="submit" class="button">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
