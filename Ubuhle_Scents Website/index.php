<?php
session_start();

// Check if user is logged in, if not redirect to login page when accessing the cart
if (!isset($_SESSION['user']) && basename($_SERVER['PHP_SELF']) === 'cart.html') {
    // Redirect to the login page if not logged in
    header('Location: account.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubuhle Scents E-Commerce</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
      /* General Styles */
      img {
        width: 300px;
        height: 300px;
        object-fit: cover;
      }
      body {
        font-family: "Arial", sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f8f8;
        color: #333;
      }

      h1, h2 {
        font-family: "Roboto", sans-serif;
        color: #333;
      }

      a {
        text-decoration: none;
      }

      ul {
        padding: 0;
        list-style: none;
      }

      /* Navigation Bar */
      .navbar {
        background-color: #ff4081; /* Bright pink */
        padding: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
      }

      .navbar ul {
        display: flex;
        gap: 20px;
      }

      .navbar ul li {
        margin: 0 10px;
      }

      .navbar ul li a {
        color: white;
        font-size: 18px;
        padding: 10px;
        transition: background-color 0.3s ease;
      }

      .navbar ul li a:hover {
        background-color: #f50057; /* Slightly darker pink */
        border-radius: 5px;
      }

      /* Search Bar */
      .search-bar {
        display: flex;
        align-items: center;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 25px;
        padding: 5px 10px;
      }

      .search-bar input[type="text"] {
        border: none;
        outline: none;
        font-size: 16px;
        padding: 5px;
        border-radius: 25px;
        width: 120px;
      }

      .search-bar button {
        border: none;
        background: none;
        cursor: pointer;
        font-size: 18px;
        color: #888;
        margin-left: 5px;
      }

      .search-bar button:hover {
        color: #333;
      }

      /* Hero Section */
      .hero {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 50px;
        background-color: #ffb6c1; /* Soft pink */
      }

      .hero-text {
        max-width: 50%;
      }

      .hero h1 {
        font-size: 48px;
        color: #3e2723; /* Dark brown */
      }

      .hero p {
        font-size: 22px;
        color: #3e2723;
        margin-top: 10px;
      }

      .cta-button {
        background-color: #ff4081;
        color: white;
        padding: 15px 30px;
        font-size: 18px;
        border-radius: 5px;
        margin-top: 20px;
        display: inline-block;
        transition: background-color 0.3s ease;
      }

      .cta-button:hover {
        background-color: #f50057;
      }

      .hero-img {
        width: 600px;
        height: auto;
        border-radius: 30px;
      }

      /* Footer */
      footer {
        background-color: #ff4081;
        text-align: center;
        padding: 20px;
      }

      footer p {
        color: white;
        font-size: 16px;
      }
    </style>
  </head>
  <body>
    <!-- Navigation Menu -->
    <header>
      <nav class="navbar">
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="account.html">Shop</a></li>
          <li><a href="account.html">Account</a></li>
          <li><a href="account.html">Cart</a></li>
          <li><a href="about_us.html">About Us</a></li>
        </ul>
        
        <!-- Search Bar -->
 <form class="search-bar" action="search.php" method="GET">
    <input type="text" name="query" placeholder="Search for products" required />
    <button type="submit">&#128269;</button>
 </form>
  
    </nav>
    </header>
    <!-- Hero Section -->
    <section id="home" class="hero">
      <div class="hero-text">
        <h1>Welcome to Ubuhle Scents</h1>
        <p>Discover your signature scent at affordable prices!</p>
        <p>Ubuhle Scents brings you a curated selection of premium fragrances that embody elegance,
          sophistication, and individuality. Our collection features a diverse range of scents from renowned brands,
          each carefully selected to offer a unique olfactory experience. Whether you're looking for something fresh and floral, warm and woody, or bold and exotic, we have the perfect scent for every occasion.</p>
        <a href="account.html" class="cta-button">Shop Now</a>
      </div>
      <img src="Ubutle.jpg" class="hero-img" alt="Main">
    </section>

    <!-- Footer Section -->
    <footer id="contact">
      <div class="footer-content">
        <p>&copy; 2024 Ubuhle Scents | All Rights Reserved</p>
      </div>
    </footer>
  </body>
</html>