<!-- cart.php -->
<?php
session_start();

// Initialize shopping cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding or updating items in cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menu_name = $_POST['menu_name'] ?? '';

    if (!empty($menu_name)) {
        // Update or add item to cart
        if (!isset($_SESSION['cart'][$menu_name])) {
            $_SESSION['cart'][$menu_name] = [
                'name' => $menu_name,
                'quantity' => 1, // Default quantity
                'price' => getMenuPrice($menu_name) // Function to get price based on menu item
            ];
        } else {
            $_SESSION['cart'][$menu_name]['quantity'] += 1; // Increment quantity
        }
    }
}

// Function to get menu price based on menu name (replace with your logic)
function getMenuPrice($menu_name) {
    switch ($menu_name) {
        case 'Coffee Latte':
            return 45000;
        case 'Vanilla Latte':
            return 49000;
        case 'Coconut Caffee':
            return 55000;
        case 'Blonde Roast':
            return 45000;
        case 'Flat White':
            return 59000;
        case 'Caramel Macchiato':
            return 60000;
        case 'Americano':
            return 40000;
        case 'Espresso':
            return 42000;
        case 'Mojito':
            return 44000;
        case 'Margarita':
            return 52000;
        case 'Blooms 1':
            return 149000;
        case 'Blooms 2':
            return 75000;
        case 'Cheese Slice':
            return 52000;
        case 'Tiramisu':
            return 52000;
        case 'Chip Cupcake':
            return 30000;
        case 'Fluffy Cupcake':
            return 30000;

        // Add more cases for other menu items as needed
        default:
            return 0;
    }
}

// Update or delete item in cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $menu_name = $_POST['menu_name'];
        $quantity = $_POST['quantity'];
        
        if (isset($_SESSION['cart'][$menu_name])) {
            $_SESSION['cart'][$menu_name]['quantity'] = $quantity;
        }
    } elseif (isset($_POST['delete'])) {
        $menu_name = $_POST['menu_name'];

        if (isset($_SESSION['cart'][$menu_name])) {
            unset($_SESSION['cart'][$menu_name]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Coffee Shop</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <h1>Shopping Cart</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="order.php">Order</a></li>
                <li class="logout-btn"><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="cart-items">
            <h2>Cart Items</h2>
            <div class="cart-items">
                <?php if (!empty($_SESSION['cart'])): ?>
                    <table>
                        <tr>
                            <th>Menu Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($_SESSION['cart'] as $menu_name => $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td>
                                    <form action="cart.php" method="POST">
                                        <input type="hidden" name="menu_name" value="<?php echo $menu_name; ?>">
                                        <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                                        <input type="submit" name="update" value="Update">
                                    </form>
                                </td>
                                <td>Rp. <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?></td>
                                <td>
                                    <form action="cart.php" method="POST">
                                        <input type="hidden" name="menu_name" value="<?php echo $menu_name; ?>">
                                        <input type="submit" name="delete" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <a href="order.php" class="proceed-btn">Proceed to Order</a>
                    <a href="menu.php" class="back-btn">Back to Menu</a>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                    <a href="menu.php" class="back-btn">Back to Menu</a>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
</body>
</html>
