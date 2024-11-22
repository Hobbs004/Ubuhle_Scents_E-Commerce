<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
       /*Search CSS */
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .product-item {
            width: 200px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-item h2 {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }

        .product-item p {
            color: #666;
            font-size: 14px;
        }

        .product-item a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #ff4081;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .product-item a:hover {
            background-color: #f50057;
        }
        /* General Navigation Menu CSS Styles */
nav ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    color: #333;
    text-decoration: none;
    font-size: 16px;
}

nav ul li a:hover {
    color: #ff4081;
}

/* Search Bar with Buttons Styles */
.search-bar {
    display: flex;
    align-items: center;
    gap: 10px; /* Adds space between items */
}

.search-bar input {
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.search-bar button {
    background-color: #ff4081;
    color: white;
    padding: 6px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.search-bar button:hover {
    background-color: #f50057;
}

/* Home and Shop Buttons Styles */
.nav-button {
    background-color: #ddd;
    color: #333;
    padding: 6px 12px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    transition: background-color 0.3s, color 0.3s;
}

.nav-button:hover {
    background-color: #ff4081;
    color: white;
}

    </style>
</head>
<body>
<header>
    <nav>
        
        <div class="search-bar">
            <a href="index.php" class="nav-button">Home</a>
            <a href="account.html" class="nav-button">Shop</a>
            <form action="search.php" method="get">
                <input type="text" name="query" placeholder="Search">
                <button type="submit">&#128269;</button>
            </form>
        </div>
    </nav>
</header>

</body>
</html>
<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'ubuhle_scents');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if query is provided
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $searchQuery = $conn->real_escape_string($_GET['query']); // Sanitize input

    // Query the products table
    $sql = "SELECT * FROM products WHERE name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Search Results for '$searchQuery'</h1>";
        echo "<div class='product-list'>";
        
        // Display each matching product
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product-item'>";
            echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "' />";
            echo "<h2>" . $row['name'] . "</h2>";
            echo "<p>Price: R" . $row['price'] . "</p>";
            echo "<a href='product_details.php?id=" . $row['id'] . "'>View Details</a>";
            echo "</div>";
        }
        
        echo "</div>";
    } else {
        echo "<h1>No products found for '$searchQuery'</h1>";
    }
} else {
    echo "<h1>Please enter a search query.</h1>";
}

// Close the database connection
$conn->close();
?>
