<?php
session_start();

// Check if remove_menu parameter is set
if (isset($_POST['remove_menu'])) {
    $remove_menu = $_POST['remove_menu'];

    // Check if item exists in cart
    if (array_key_exists($remove_menu, $_SESSION['cart'])) {
        // Remove item from cart
        unset($_SESSION['cart'][$remove_menu]);
    }
}

// Redirect back to cart.php
header("Location: cart.php");
exit();
?>
