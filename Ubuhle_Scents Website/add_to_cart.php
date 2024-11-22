<?php
session_start();

// Get the request payload
$data = json_decode(file_get_contents('php://input'), true);

// Initialize cart session if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Action handler
$response = ['status' => 'error', 'message' => 'Invalid action'];

if (isset($data['action'])) {
    switch ($data['action']) {
        case 'add':
            // Add item to cart
            $_SESSION['cart'][] = [
                'id' => $data['id'],
                'name' => $data['productName'],
                'price' => $data['productPrice'],
                'quantity' => $data['quantity'],
                'image' => $data['image'],
            ];
            $response = ['status' => 'success', 'message' => 'Product added to cart'];
            break;

        case 'remove':
            // Remove item by ID
            $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($data) {
                return $item['id'] !== $data['id'];
            });
            $response = ['status' => 'success', 'message' => 'Product removed from cart'];
            break;

        case 'update':
            // Update item quantity
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] === $data['id']) {
                    $item['quantity'] = $data['quantity'];
                    break;
                }
            }
            $response = ['status' => 'success', 'message' => 'Quantity updated'];
            break;

        case 'fetch':
            // Fetch cart items
            $response = ['status' => 'success', 'cart' => $_SESSION['cart']];
            break;
    }
}

// Return response
header('Content-Type: application/json');
echo json_encode($response);
?>