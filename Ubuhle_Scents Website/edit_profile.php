<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

// Get user data from session
$user_id = $_SESSION['user_id'];
$fullname = $_SESSION['fullname'];
$email = $_SESSION['email'];

// Update profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_fullname = trim($_POST['fullname']);
    $new_email = trim($_POST['email']);

    // Prepare the SQL query to update fullname and email
    $sql = "UPDATE users SET fullname = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_fullname, $new_email, $user_id);

    if ($stmt->execute()) {
        // Update session values if the profile is updated successfully
        $_SESSION['fullname'] = $new_fullname;
        $_SESSION['email'] = $new_email;
        $success_message = "Profile updated successfully!";
    } else {
        $error = "Error updating profile. Please try again.";
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
    <title>Edit Profile - Ubuhle Scents</title>
    <style>
        /* General Styles */
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
            text-align: center;
            font-family: "Roboto", sans-serif;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 16px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group button {
            background-color: #ff4081;
            color: white;
            font-size: 16px;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
        }

        .form-group button:hover {
            background-color: #e1366b;
        }

        .error {
            color: red;
            font-size: 14px;
            text-align: center;
        }

        /* Success message styling */
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Profile</h1>

    <?php if (isset($error)) { echo "<div class='error'>$error</div>"; } ?>
    <?php if (isset($success_message)) { echo "<div class='success-message'>$success_message</div>"; } ?>

    <form action="edit_profile.php" method="POST">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div class="form-group">
            <button type="submit">Save Changes</button>
        </div>
    </form>
</div>

<?php if (isset($success_message)): ?>
    <script>
        // JavaScript to show the success popup after successful profile update
        alert("Profile updated successfully!");
    </script>
<?php endif; ?>

</body>
</html>
