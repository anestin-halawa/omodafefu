<?php
    // Include koneksi database
    include 'koneksi.php';

    session_start(); // Mulai session untuk pengaturan login/logout

    // Proses registrasi sebelum output HTML
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        // Validasi password dan konfirmasi password
        if ($password != $confirm_password) {
            $_SESSION['error'] = "Password dan konfirmasi password tidak cocok.";
        } else {
            // Hash password sebelum disimpan
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Cek apakah username atau email sudah ada
            $check_user = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $result = $koneksi->query($check_user);

            if ($result->num_rows > 0) {
                $_SESSION['error'] = "Username atau email sudah terdaftar. Silakan gunakan yang lain.";
            } else {
                // Insert data user baru ke database
                $sql = "INSERT INTO users (fullname, email, username, password, address, phone) 
                        VALUES ('$fullname', '$email', '$username', '$hashed_password', '$address', '$phone')";
                if ($koneksi->query($sql) === TRUE) {
                    // Redirect ke login.php setelah registrasi berhasil
                    header("Location: login.php");
                    exit();
                } else {
                    $_SESSION['error'] = "Error: " . $sql . "<br>" . $koneksi->error;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Link ke Font Awesome untuk ikon sosial media -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ff6600;
        }

        .form-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #ff6600;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #e64c3c;
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ff6600;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <!-- Include menu.php -->
    <?php include 'menu.php'; ?>

    <div class="form-container">
        <h2>Registrasi</h2>

        <!-- Menampilkan error jika ada -->
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p class='error'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']); // Hapus session error setelah ditampilkan
        }
        ?>

        <form action="register.php" method="POST">
            <input type="text" name="fullname" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            <input type="text" name="address" placeholder="Alamat" required>
            <input type="text" name="phone" placeholder="Nomor Telepon" required>
            <button type="submit">Daftar</button>
        </form>
        <a href="login.php">Sudah punya akun? Login di sini</a>
    </div>

</body>
</html>
