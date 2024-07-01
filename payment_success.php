<?php include('db/config.php'); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];

    // Here you would process the payment and update the order status
    // For simplicity, we'll just assume the payment is successful

    $success = true;

    if ($success) {
        $message = "Your payment was successful!";
    } else {
        $message = "Your payment failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success - Coffee Shop</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <h1>Payment Confirmation</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="order.php">Order</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="payment-success">
            <h2><?php echo $message; ?></h2>
            <p><a href="index.php">Back to Home</a></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
</body>
</html>
