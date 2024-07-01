<?php
session_start();

// Initialize variables with default values to prevent warnings
$name = isset($_SESSION['order_details']['name']) ? htmlspecialchars($_SESSION['order_details']['name']) : 'Not Provided';
$phone = isset($_SESSION['order_details']['phone']) ? htmlspecialchars($_SESSION['order_details']['phone']) : 'Not Provided';
$dine_take = isset($_SESSION['order_details']['dine_take']) ? ($_SESSION['order_details']['dine_take'] == 'dine_in' ? 'Dine In' : 'Take Away') : 'Not Provided';
$queue_number = isset($_SESSION['order_details']['queue_number']) ? htmlspecialchars($_SESSION['order_details']['queue_number']) : 'Not Assigned';
$payment_method = isset($_SESSION['order_details']['payment']) ? ($_SESSION['order_details']['payment'] == 'cash' ? 'Cash' : 'Credit Card') : 'Not Provided';

// Initialize empty array for cart items
$cart_items = [];

// Calculate total price
$total_price = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_items[] = [
            'name' => htmlspecialchars($item['name']),
            'quantity' => $item['quantity'],
            'price' => $item['price'],
            'total' => $item['price'] * $item['quantity']
        ];
        $total_price += $item['price'] * $item['quantity'];
    }
}

// Clear the session variables (optional)
unset($_SESSION['cart']);
unset($_SESSION['order_details']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success - Coffee Shop</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #AF8F6F;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
        }
        nav {
            text-align: center;
            margin-top: 10px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #EADBC8;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .order-box {
            background-color: #F6F5F2; /* Warna latar belakang untuk kotak informasi */
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .order-details table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .order-details table th,
        .order-details table td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .order-details h3 {
            margin-top: 0;
        }
        .order-details a {
            display: inline-block;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .order-details a:hover {
            background-color: #555;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background-color: ##AF8F6F;
            color: #555;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .queue-number {
            margin: 20px 0;
            font-size: 1.5em;
            font-weight: bold;
            color: #AF8F6F;
        }
    </style>
</head>
<body>
    <header>
        <h1>Order Success</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="order.php">Order</a></li>
                <li class="logout-btn"><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="order-details">
            <h2>Thank you for your order!</h2>
            <p>Your order has been successfully placed.</p>
            <div class="queue-number">Queue No: <?php echo $queue_number; ?></div>
            <div class="order-box">
                <h3>Order Details:</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $name; ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td><?php echo $phone; ?></td>
                    </tr>
                    <tr>
                        <th>Information</th>
                        <td><?php echo $dine_take; ?></td>
                    </tr>
                    <tr>
                        <th>Payment Method</th>
                        <td><?php echo $payment_method; ?></td>
                    </tr>
                </table>
                <?php if (!empty($cart_items)): ?>
                <h3>Ordered Items:</h3>
                <ul>
                    <?php foreach ($cart_items as $item): ?>
                        <li><?php echo $item['name']; ?> - Quantity: <?php echo $item['quantity']; ?> - Total Price: Rp. <?php echo number_format($item['total'], 0, ',', '.'); ?></li>
                    <?php endforeach; ?>
                </ul>
                <h3>Total Price: Rp. <?php echo number_format($total_price, 0, ',', '.'); ?></h3>
                <?php endif; ?>
            </div>
            <a href="index.php" class="btn">Back to Home</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
</body>
</html>
