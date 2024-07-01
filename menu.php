<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Coffee Shop</title>
     <!-- Link to Google Fonts -->
     <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <h1>Blooms Menu</h1>
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
        <section id="menu">
            <div class="menu-banner">
                <img src="images/bann2.png" alt="Menu Banner" style="width: 100%;">
            </div>
            <div class="menu-items">
                <div class="menu-item">
                    <img src="images/fix5.jpg" alt="Coffee Latte">
                    <h3>Coffee Latte</h3>
                    <p>Smooth espresso with steamed milk</p>
                    <p>Rp. 45.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Coffee Latte">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/fix1.jpg" alt="Vanilla Latte">
                    <h3>Vanilla Latte</h3>
                    <p>Espresso with vanilla n milk</p>
                    <p>Rp. 49.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Vanilla Latte">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/fix2.jpg" alt="Coconut Coffee">
                    <h3>Coconut Coffee</h3>
                    <p>Espresso with coconut milk</p>
                    <p>Rp. 55.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Coconut Coffee">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/fix3.jpg" alt="Blonde Roast">
                    <h3>Blonde Roast</h3>
                    <p>A light roast coffee flavor</p>
                    <p>Rp. 45.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Blonde Roast">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/fix4.jpg" alt="Flat White">
                    <h3>Flat White</h3>
                    <p>Rich espresso with steamed milk</p>
                    <p>Rp. 59.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Flat White">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/c3.jpg" alt="Caramel Macchiato">
                    <h3>Caramel Macchiato</h3>
                    <p>Espresso with vanilla n milk</p>
                    <p>Rp. 60.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Caramel Macchiato">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/amer2.jpg" alt="Americano">
                    <h3>Americano</h3>
                    <p>Espresso with hot water</p>
                    <p>Rp. 40.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Americano">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/esspres.jpg" alt="Espresso">
                    <h3>Espresso</h3>
                    <p>Strong and rich shot of coffee</p>
                    <p>Rp. 42.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Espresso">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/mojito.jpg" alt="Mojito">
                    <h3>Mojito</h3>
                    <p>Refreshing mint and lime mocktail</p>
                    <p>Rp. 44.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Mojito">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/marga.jpg" alt="Margarita">
                    <h3>Margarita</h3>
                    <p>Classic lime mocktail</p>
                    <p>Rp. 52.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Margarita">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/m1.jpg" alt="Blooms 1">
                    <h3>Blooms 1</h3>
                    <p>Signature house blend coffee</p>
                    <p>Rp. 149.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Blooms 1">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/m2.jpg" alt="Blooms 2">
                    <h3>Blooms 2</h3>
                    <p>Specialty brewed coffee</p>
                    <p>Rp. 75.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Blooms 2">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/cheese.jpg" alt="Cheese Slice">
                    <h3>Cheese Slice</h3>
                    <p>Rich and creamy cheesecake slice</p>
                    <p>Rp. 52.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Cheese Slice">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/tiramisu.jpg" alt="Tiramisu">
                    <h3>Tiramisu</h3>
                    <p>Classic Italian dessert with coffee flavor</p>
                    <p>Rp. 52.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Tiramisu">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/o1.jpg" alt="Chip Cupcake">
                    <h3>Chip Cupcake</h3>
                    <p>Fluffy pancake with chocolate chips</p>
                    <p>Rp. 30.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Chip Cupcake">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
                <div class="menu-item">
                    <img src="images/02.jpg" alt="Fluffy Cupacke">
                    <h3>Fluffy Cupcake</h3>
                    <p>Classic fluffy pancake</p>
                    <p>Rp. 30.000</p>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="menu_name" value="Fluffy Cupcake">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
    <script>
        window.addEventListener('scroll', function() {
            var footer = document.querySelector('footer');
            if (window.scrollY > 100) {
                footer.classList.add('visible');
            } else {
                footer.classList.remove('visible');
            }
        });
    </script>
</body>
</html>
