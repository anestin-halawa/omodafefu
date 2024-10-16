<?php
// Cek jika session sudah aktif sebelum memulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'koneksi.php'; // Menghubungkan dengan database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Siapkan statement untuk menghindari SQL injection
    $sql = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

    // Cek apakah username ada di database
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Jika login berhasil, simpan data ke session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username']; // Simpan username
            $_SESSION['fullname'] = $user['fullname']; // Simpan nama lengkap
            $_SESSION['user_id'] = $user['id']; // Simpan user_id
            header("Location: index.php"); // Redirect ke halaman utama setelah login berhasil
            exit();
        } else {
            $error_message = "Password salah.";
        }
    } else {
        $error_message = "Username tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS for Styling -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f06d06, #ffaf00);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .form-container:hover {
            transform: translateY(-10px);
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-container input {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-container input:focus {
            border-color: #ff6600;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 102, 0, 0.3);
        }

        .form-container button {
            width: 100%;
            padding: 15px;
            background-color: #ff6600;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .form-container button:hover {
            background-color: #e64c3c;
            box-shadow: 0 4px 15px rgba(230, 76, 60, 0.3);
            transform: translateY(-2px);
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ff6600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .form-container a:hover {
            text-decoration: underline;
            color: #e64c3c;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        .social-buttons {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .social-buttons button {
            width: 48%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .social-buttons button i {
            margin-right: 10px;
            font-size: 20px;
        }

        .google {
            background-color: #4285F4;
            color: #fff;
        }

        .google:hover {
            background-color: #357AE8;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(53, 122, 232, 0.3);
        }

        .facebook {
            background-color: #1877F2;
            color: #fff;
        }

        .facebook:hover {
            background-color: #1464CC;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(20, 100, 204, 0.3);
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>

        <!-- Tampilkan error jika ada -->
        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>

        <!-- Tombol Sosial Media -->
        <div class="social-buttons">
            <button class="google"><i class="fab fa-google"></i> Login dengan Google</button>
            <button class="facebook"><i class="fab fa-facebook-f"></i> Login dengan Facebook</button>
        </div>

        <a href="register.php">Belum punya akun? Daftar di sini</a>
    </div>

</body>
</html>
