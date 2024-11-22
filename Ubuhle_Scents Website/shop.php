<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop - Ubuhle Scents</title>
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
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      background-color: #f9f9f9;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      padding: 20px;
    }

    h1 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }

    /* Navigation Bar */
    .navbar {
      width: 100%;
      background-color: #ff4081;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar ul {
      list-style: none;
      display: flex;
      padding: 0;
      margin: 0;
    }

    .navbar li {
      margin: 0 15px;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .navbar .search-bar input {
      padding: 5px;
      border: none;
      border-radius: 3px;
    }

    .navbar .search-bar button {
      padding: 5px 10px;
      border: none;
      border-radius: 3px;
      background-color: white;
      color: #ff4081;
      cursor: pointer;
      font-weight: bold;
    }

    .cart-counter {
      background-color: white;
      color: #ff4081;
      border-radius: 50%;
      padding: 2px 8px;
      font-size: 12px;
      margin-left: 5px;
    }

    /* Product Grid */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    /* Product Card */
    .product-card {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 15px;
      text-align: center;
      transition: transform 0.3s;
    }

    .product-card:hover {
      transform: scale(1.05);
    }

    .product-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .product-name {
      font-size: 18px;
      color: #333;
      margin: 10px 0;
    }

    .product-price {
      font-size: 16px;
      color: #ff4081;
      margin: 5px 0 15px;
    }

    .product-description {
      font-size: 14px;
      color: #666;
      margin: 10px 0;
    }

    .add-to-cart-button {
      background-color: #ff4081;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .add-to-cart-button:hover {
      background-color: #f50057;
    }
  </style>
</head>
<body>
  <!-- Navigation Menu -->
  <header>
    <nav class="navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
      </ul>
     <!-- Search Bar -->
<form class="search-bar" action="search.php" method="GET">
    <input type="text" name="query" placeholder="Search for products" required />
    <button type="submit">&#128269;</button>
</form>
     <!-- Cart and Account Links -->
      <ul>
        <li>
          <a href="cart.html">Cart <span id="cart-counter" class="cart-counter">0</span></a>
        </li>
        <li><a href="account.html">Account</a></li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1>Shop - Ubuhle Scents</h1>
    <p style="text-align: center; color: #666;">Explore our exclusive collection of premium fragrances and find your signature scent.</p>

    <!-- Product Grid -->
    <div class="product-grid">
      <div class="product-card">
        <img src="Male.jpg" class="product-image" alt="Product 1">
        <h2 class="product-name">Elegant Blossom</h2>
        <p class="product-price">R499.99</p>
        <p class="product-description">A floral fragrance with hints of jasmine and rose, perfect for daytime wear.</p>
        <button class="add-to-cart-button" onclick="addToCart('Elegant Blossom', 499.99, 1, 'Male.jpg')">Add to Cart</button>
      </div>

      <div class="product-card">
        <img src="women.jpg" class="product-image" alt="Product 2">
        <h2 class="product-name">Mystic Oud</h2>
        <p class="product-price">R699.99</p>
        <p class="product-description">An exotic blend of oud and sandalwood, ideal for evening occasions.</p>
        <button class="add-to-cart-button" onclick="addToCart('Mystic Oud', 699.99, 2, 'women.jpg')">Add to Cart</button>
      </div>

      <div class="product-card">
        <img src="unisex.jpg" class="product-image" alt="Product 3">
        <h2 class="product-name">Fresh Citrus</h2>
        <p class="product-price">R399.99</p>
        <p class="product-description">A refreshing scent with citrus notes, bringing energy and zest to your day.</p>
        <button class="add-to-cart-button" onclick="addToCart('Fresh Citrus', 399.99, 3, 'unisex.jpg')">Add to Cart</button>
      </div>

      <div class="product-card">
        <img src="www.jpg" class="product-image" alt="Product 4">
        <h2 class="product-name">Warm Vanilla</h2>
        <p class="product-price">R549.99</p>
        <p class="product-description">A warm, cozy fragrance with vanilla and caramel undertones, perfect for cooler nights.</p>
        <button class="add-to-cart-button" onclick="addToCart('Warm Vanilla', 549.99, 4, 'www.jpg')">Add to Cart</button>
      </div>
    </div>
  </div>

  <script>
    const cartCounterElement = document.getElementById('cart-counter');
    let cartCount = 0;

    function updateCartCount() {
      fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'fetch' }),
      })
        .then((res) => res.json())
        .then((data) => {
          cartCount = data.cart.length;
          cartCounterElement.textContent = cartCount;
        });
    }

    function addToCart(productName, productPrice, productId, productImage) {
      alert(`${productName} has been added to your cart!`);
      fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          action: 'add',
          id: productId,
          productName,
          productPrice,
          quantity: 1,
          image: productImage,
        }),
      })
        .then(() => updateCartCount());
    }

    updateCartCount();
  </script>
</body>
</html>
