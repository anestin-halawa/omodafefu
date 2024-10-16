<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Include koneksi database
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $abstract = $_POST['abstract']; // Ambil data abstrak
    $user_id = $_SESSION['user_id']; // Ambil id pengguna dari session

    // Cek apakah judul artikel dan abstrak telah diisi
    if (empty($title) || empty($abstract)) {
        $error_message = "Judul dan abstrak artikel wajib diisi!";
    } else {
        // Proses file upload PDF
        $target_dir = "artikel/";
        $file_name = basename($_FILES["pdf_file"]["name"]);
        $target_file = $target_dir . $file_name;
        $upload_ok = true;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file adalah PDF
        if ($file_type != "pdf") {
            $error_message = "Hanya file PDF yang diperbolehkan.";
            $upload_ok = false;
        }

        // Cek jika upload berhasil
        if ($upload_ok && move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $target_file)) {
            // Simpan data artikel ke database termasuk abstrak
            $query = "INSERT INTO articles (title, abstract, file_path, user_id) 
                      VALUES ('$title', '$abstract', '$target_file', '$user_id')";

            if ($koneksi->query($query) === TRUE) {
                // Setelah berhasil upload, redirect ke halaman article.php
                header("Location: article.php");
                exit();
            } else {
                $error_message = "Error: " . $koneksi->error;
            }
        } else {
            $error_message = "Terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Artikel PDF</title>
    <!-- Link ke Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4e54c8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #e74c3c;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #ccc;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #aaa;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- Jika ada error tampilkan pesan error -->
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <div class="form-container">
        <h2>Unggah Artikel PDF</h2>
        <a href="index.php" class="back-button">Kembali ke Home</a>
        <form action="upload_article.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Judul Artikel" required>
            <textarea name="abstract" rows="4" placeholder="Abstrak Artikel" required></textarea>
            <input type="file" name="pdf_file" accept=".pdf" required>
            <button type="submit">Unggah Artikel</button>
        </form>
    </div>

</body>
</html>
