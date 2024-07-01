<?php
session_start();

// Initialize session variables if not exists
if (!isset($_SESSION['order_details'])) {
    $_SESSION['order_details'] = [];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $dine_take = $_POST['dine_take'] ?? '';
    $payment = $_POST['payment'] ?? '';

    // Validate and store in session
    if (!empty($name) && !empty($phone) && !empty($dine_take) && !empty($payment)) {
        $_SESSION['order_details']['name'] = $name;
        $_SESSION['order_details']['phone'] = $phone;
        $_SESSION['order_details']['dine_take'] = $dine_take;
        $_SESSION['order_details']['payment'] = $payment;

        // Generate queue number (example: random number)
        $_SESSION['order_details']['queue_number'] = rand(100, 999); // Example: Generate random queue number
        header("Location: order_success.php");
        exit();
    } else {
        $error = "Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order - Coffee Shop</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            background-image: url('images/t4.jpg');
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            font-family: 'Nunito', sans-serif; /* Apply Nunito font */
            font-size: 0.5rem 1rem; /* Increase font size */
            font-weight: 400; /* Regular weight */
        }
        nav ul li a:hover {
            background-color: #EADBC8;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #BBAB8C;
            background-image: url('images/t5.jpg');
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
        }
        .order-box {
            background-color: #BBAB8C;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        .queue-number {
            margin: 20px 0;
            font-size: 1.5em;
            font-weight: bold;
            color: #AF8F6F;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            width: 150px;
            margin-right: 10px;
            text-align: left;
            color: #fff;
        }
        .form-group input,
        .form-group select {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #order-form h2 {
            text-align: center;
            color: #fff;
        }
        .form-submit {
            text-align: center;
        }
        .form-submit input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #AF8F6F;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-submit input[type="submit"]:hover {
            background-color: #8E7354;
        }
        .customer-center {
            display: flex;
            align-items: flex-start;
            background-color: #F6F5F2;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .customer-center img {
            margin-right: 20px;
            border-radius: 5px;
        }
        .customer-center div {
            max-width: 600px;
            margin-right: 70px;
        }
        .contact-info {
            margin-left: 20px;
            margin-right: 20px;
        }
        footer {
            text-align: center;
            padding: 5px 0; /* Reduced padding */
            background-color: #AF8F6F;
            color: #fff;
            width: 100%;
            margin-top: auto;
        }
        footer p {
            margin: 5px 0; /* Reduced margin */
            font-size: 0.9em; /* Smaller font size */
        }
    </style>
</head>
<body>
    <header>
        <h1>Place Your Order</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li class="logout-btn"><a href="logout.php">Logout</a></li>

            </ul>
        </nav>
    </header>
    <main>
        <section id="order-form" class="order-box">
            <h2>Order Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="dine_take">Dine In / Take Away:</label>
                    <select id="dine_take" name="dine_take" required>
                        <option value="dine_in">Dine In</option>
                        <option value="take_away">Take Away</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="payment">Payment Method:</label>
                    <select id="payment" name="payment" required>
                        <option value="cash">Cash</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="qris">QRIS</option>
                    </select>
                </div>
                <div class="form-submit">
                    <input type="submit" value="Place Order">
                </div>
            </form>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
        </section>
    </main>
    <section class="customer-center">
        <img src="images/logo.png" alt="Customer Center" width="150" height="150">
        <div>
            <h3>Customer Center</h3>
            <p>Blooms Caffee<br>
            Jl. Mawar Indah No. 24, RT 014/RW 001 Kelurahan Gajahan<br>
            Kecamatan Pasar Kliwon, Surakarta, Jawa Tengah<br>
            0825-1452-9865</p>
        </div>
        <div class="contact-info">
            <h3>Member</h3>
            <p>Tutut Bagiawati<br>
            Amara Nazula W<br>
            Syakilla Salsa B</p>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Coffee Shop. All Rights Reserved.</p>
    </footer>
</body>
</html>
