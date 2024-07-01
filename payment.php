<?php include('db/config.php'); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $name = $_POST['name'];
    $menu = $_POST['menu'];

    // Fetch order details from the database if needed
    $sql = "SELECT price FROM menu WHERE name='$menu'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];
    } else {
        $price = "N/A";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Coffee Shop</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <h1>Payment</h1>
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
        <section id="payment">
            <h2>Payment Details</h2>
            <p><strong>Order ID:</strong> <?php echo htmlspecialchars($order_id); ?></p>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
            <p><strong>Menu Item:</strong> <?php echo htmlspecialchars($menu); ?></p>
            <p><strong>Total Price:</strong> $<?php echo htmlspecialchars($price); ?></p>
            
            <form action="payment_success.php" method="POST">
                <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order_id); ?>">
                <input type="submit" value="Confirm Payment">
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
</body>
</html>
