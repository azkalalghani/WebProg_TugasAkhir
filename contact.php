<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Coffee Shop</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Inter:wght@400;700&family=Merriweather:wght@400;700&family=Nunito:wght@400;700&display=swap">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            position: relative;
            font-family: 'Roboto', sans-serif; /* Default font for body */
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
            font-weight: 700; /* Bold font for header title */
            font-family: 'Merriweather', serif; /* Apply Merriweather font */
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
            flex: 1;
            padding: 20px;
            position: relative;
        }
        footer {
            background-color: #AF8F6F;
            color: #FFF;
            text-align: center;
            padding: 10px 0;
            font-size: 0.9em;
            width: 100%;
            position: relative;
        }
        .center-text {
            text-align: center;
        }
        .contact-image {
            text-align: center;
            margin: 20px auto; /* Memusatkan gambar */
            max-width: 800px; /* Lebar maksimum gambar */
        }
        .contact-image img {
            width: 100%; /* Lebar gambar 100% dari container */
            height: auto; /* Tinggi gambar disesuaikan dengan proporsi */
            display: block; /* Menjamin gambar tampil dengan baik */
            border-radius: 10px; /* Menggunakan border radius */
        }
        .social-media {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px; /* Memberi jarak ke footer */
        }
        .social-media a {
            display: inline-block;
            width: 40px; /* Lebar ikon sosial media */
            height: 40px; /* Tinggi ikon sosial media */
            border-radius: 50%; /* Bentuk bulat */
            overflow: hidden;
        }
        .social-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        #contact h2 {
            font-family: 'Inter', sans-serif; /* Menggunakan font Inter */
            font-weight: 700; /* Bold font */
            font-size: 2em;
            margin-bottom: 10px;
            color: #5A3825; /* Warna untuk judul */
        }
        #contact p {
            font-family: 'Inter', sans-serif; /* Menggunakan font Inter */
            font-weight: 400; /* Regular font */
            font-size: 1.2em;
            margin-bottom: 20px;
            color: #6F4E37; /* Warna untuk paragraf */
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Blooms Coffee Shop</h1>
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
        <section id="contact" class="center-text">
            <h2>Contact Us</h2>
            <p>Have questions or comments? Just write us a message!</p>
            <div class="contact-image">
                <img src="images/contact.jpeg" alt="Contact Image">
            </div>
        </section>
    </main>
    <footer>
        <div class="social-media">
            <a href="https://www.instagram.com/pompomchocobi?igsh=MWRyYXM4em1tc25naA%3D%3D&utm_source=qr" target="_blank"><img src="images/instagram.jpeg" alt="Instagram"></a>
            <a href="https://wa.me/6282328352246" target="_blank"><img src="images/wa.jpeg" alt="Whatsapp"></a>
            <a href="https://maps.app.goo.gl/YkyCDZin29S56cKq5?g_st=com.google.maps.preview.copy" target="_blank"><img src="images/lokasi.jpeg" alt="Location"></a>
        </div>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
</body>
</html>
