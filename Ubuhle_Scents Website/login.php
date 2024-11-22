<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare and execute SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id']; // Store user ID
            $_SESSION['username'] = $user['username']; // Store username (adjust based on your table)
            $_SESSION['email'] = $user['email'];
            $_SESSION['fullname'] = $user['fullname']; // Ensure this matches your database column

            // Redirect to the profile page or dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password."; // Store the error for invalid password
        }
    } else {
        $error = "No user found with this email."; // Store the error for non-existing user
    }

    // Clean up
    $stmt->close();
    $conn->close();
}


?>
