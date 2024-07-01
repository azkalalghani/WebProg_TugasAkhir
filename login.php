<?php
session_start();

// Jika pengguna sudah login, redirect ke halaman menu
if (isset($_SESSION['username'])) {

}

// Konfigurasi database
$servername = "localhost";
$db_username = "root"; // Sesuaikan dengan username MySQL Anda
$db_password = ""; // Sesuaikan dengan password MySQL Anda
$dbname = "coffee_shop"; // Nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';
$username = '';
$remember_checked = '';

// Cek jika pengguna sudah "remembered" dari cookie
if (isset($_COOKIE['remember_me'])) {
    $username = $_COOKIE['remember_me'];
    $remember_checked = 'checked';
} elseif (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $remember_checked = 'checked'; // Tambahkan ini
}

// Validasi login saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    // Mencari pengguna berdasarkan username
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Memverifikasi password
        if (password_verify($password, $hashed_password)) {
            // Simpan username ke dalam session
            $_SESSION['username'] = $username;

            // Set cookie untuk mengingat akun jika dicentang "Remember Me"
            if ($remember) {
                setcookie('remember_me', $username, time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
            } else {
                // Hapus cookie jika "Remember Me" tidak dicentang
                setcookie('remember_me', '', time() - 3600, "/");
            }

            // Redirect ke halaman menu setelah login berhasil
            header('Location: index.php');
            exit;
        } else {
            $error = 'Username or password is incorrect.';
        }
    } else {
        $error = 'Username or password is incorrect.';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Coffee Shop</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        /* Style tambahan untuk form login */
        form {
            max-width: 300px;
            margin: 20px auto;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"], input[type="submit"], input[type="checkbox"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #AF8F6F;
            color: white;
            border: none;
            cursor: pointer;
            padding: 15px 20px; /* Padding yang lebih besar */
            font-size: 16px; /* Ukuran font yang lebih besar */
            border-radius: 5px; /* Sudut yang sedikit dibulatkan */
            transition: background-color 0.3s ease; /* Efek transisi saat hover */
        }
        input[type="submit"]:hover {
            background-color: #E4C59E;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        /* Gaya tambahan untuk tautan "Register here" */
        p {
            text-align: center;
            margin-top: 20px;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        /* Gaya untuk label "Remember Me" dan kotak centang */
        label.remember-me {
            display: inline-flex; /* Menjadikan label dan checkbox inline */
            align-items: center; /* Mengatur vertikal terpusat */
        }
    </style>
</head>
<body>
    <header>
        <h1>Blooms Login</h1>
    </header>
    <main>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <!-- Label "Remember Me" dan kotak centang disusun dengan gaya baru -->
            <label class="remember-me">
                <input type="checkbox" id="remember" name="remember" <?php echo $remember_checked; ?>> Remember Me
            </label>
            <input type="submit" value="Login">
        </form>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </main>
    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
</body>
</html>