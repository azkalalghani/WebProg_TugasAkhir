<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Coffee Shop</title>
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            overflow-y: auto;
        }

        body {
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        header {
            background-color: #AF8F6F;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header-content {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .header-content h1 {
            font-family: 'Merriweather', serif; /* Apply Merriweather font */
            margin: 0;
            text-align: center;
        }

        .username-container {
            position: absolute;
            right: 2rem;
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
            color: #fff;
        }

        nav {
            width: 100%;
            background-color: #AF8F6F;
            padding: 1rem 0;
            display: flex;
            justify-content: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li.logout-btn {
            margin-left: auto;
            padding: 0.5rem 1rem;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-family: 'Nunito', sans-serif; /* Apply Nunito font */
            font-size: 0.9rem; /* Adjusted font size */
            font-weight: 400; /* Regular weight */
        }

        nav ul li a.username {
            margin-right: 10px;
            font-weight: bold;
        }

        nav ul li a.logout-btn:hover {
            background-color: #EADBC;
        }

        /* Main Content */
        main {
            padding: 1rem;
            padding-top: 160px; /* Add top padding to avoid content being hidden behind the fixed header */
        }

        .banner {
            width: 100%;
            height: 100vh; /* Set height to viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .banner-top {
            background-image: url('images/fixxx.png'); /* Replace with your top image path */
        }

        .banner-bottom {
            background-image: url('images/fix22.png'); /* Replace with your bottom image path */
        }

        .content {
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.8); /* Add transparency to make text readable */
            width: 80%;
            margin: 2rem auto;
            text-align: center;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 1rem;
            background-color: #AF8F6F;
            color: #fff;
            width: 100%;
            z-index: 10;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
            }

            nav ul {
                flex-direction: column;
            }

            nav ul li {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Welcome to Blooms Coffee</h1>
            <?php if (isset($_SESSION['username'])): ?>
            <div class="username-container">
                Halo, <?php echo $_SESSION['username']; ?>
            </div>
            <?php endif; ?>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="profile.php">About Us</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="logout-btn"><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="logout-btn"><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <div class="banner banner-top">
            <div class="content">
                <section id="about">
                    <h2>About Us</h2>
                    <p>Welcome to Coffee Shop, where we serve the best coffee in town. Whether you prefer a simple black coffee or a creamy latte, we have something for everyone.</p>
                </section>
            </div>
        </div>

        <div class="banner banner-bottom">
            <div class="content">
                <!-- No content here, removed "Our Services" section -->
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
</body>
</html>
