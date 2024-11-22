<?php
// Start the session to access session variables
session_start();

// Ensure the user is logged in by checking if 'user_id' exists in the session
if (!isset($_SESSION['user_id'])) {
    echo "User is not logged in. Please log in to view your profile.";
    exit();
}

// Include the database connection
include 'db.php';

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Fetch the user details from the database
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile - Ubuhle Scents</title>
    <style>
        /* General Styles */
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-info p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }

        .edit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff4081;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }

        .edit-btn:hover {
            background-color: #e0356a;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>View Profile</h1>
    <div class="profile-info">
        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['fullname']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
       

        <!-- Link to Edit Profile -->
        <a href="edit_profile.php" class="edit-btn">Edit Profile</a>
    </div>
</div>

</body>
</html>
