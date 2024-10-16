<?php
session_start();
include 'koneksi.php';

// Dapatkan data artikel dari database
$query = "SELECT articles.*, users.fullname FROM articles JOIN users ON articles.user_id = users.id ORDER BY created_at ASC"; // Changed DESC to ASC
$result = $koneksi->query($query);

// Cek apakah pengguna sudah login
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

// Cek apakah ada pencarian
$searchTerm = '';
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Membangun query untuk mengambil artikel berdasarkan pencarian judul atau abstrak
    $query = "SELECT articles.*, users.fullname FROM articles JOIN users ON articles.user_id = users.id WHERE articles.title LIKE '%$searchTerm%' OR articles.abstract LIKE '%$searchTerm%' ORDER BY created_at ASC"; // Changed DESC to ASC
    $result = $koneksi->query($query);

    // Jika tidak ada hasil, tampilkan artikel yang ada
    if ($result->num_rows === 0) {
        $query = "SELECT articles.*, users.fullname FROM articles JOIN users ON articles.user_id = users.id ORDER BY created_at ASC"; // Changed DESC to ASC
        $result = $koneksi->query($query);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
        }

        .header {
            background-color: #4a90e2;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 26px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            margin: 20px auto;
            width: 80%;
        }

        .scrolling-text {
            display: inline-block;
            animation: scroll 10s linear infinite;
            white-space: nowrap;
        }

        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .article-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .article-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: calc(33.333% - 20px);
            padding: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            border: 1px solid #e0e0e0;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #4a90e2; /* Add a border for style */
            transition: transform 0.3s ease;
        }

        .article-image:hover {
            transform: scale(1.05); /* Slight zoom effect on hover */
        }

        .article-content h3 {
            font-size: 22px;
            margin-top: 15px;
            color: #4a90e2;
            font-weight: 600; /* Bold font for title */
        }

        .article-content p {
            font-size: 16px;
            color: #555;
            line-height: 1.8; /* Improved line height for readability */
            margin-bottom: 15px;
        }

        .article-content .author {
            font-size: 15px;
            color: #888;
            margin-bottom: 10px;
            font-style: italic; /* Italic for the author name */
        }

        .read-more {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-weight: bold; /* Bold text for the button */
        }

        .read-more:hover {
            background-color: #e74c3c;
            transform: scale(1.05);
        }

        .upload-btn {
            display: block;
            max-width: 220px;
            margin: 30px auto;
            padding: 15px;
            background-color: orange;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 30px;
            font-size: 18px; /* Increased font size */
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-weight: bold; /* Bold text for the button */
        }

        .upload-btn:hover {
            background-color: #e74c3c;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .article-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .article-card {
                width: 100%;
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            max-width: 80%;
            position: relative;
            height: 80vh;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #4a90e2;
        }

        .modal-content h3 {
            margin-top: 0;
            color: #4a90e2;
        }

        .pdf-viewer {
            width: 100%;
            height: 60%;
            border: none;
        }

        .abstract {
            margin-bottom: 20px;
            font-size: 16px;
            color: #555;
        }

        .search-container {
            max-width: 1200px;
            margin: 20px auto;
            text-align: center;
            padding: 20px;
        }

        .search-input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-right: 10px;
            transition: border 0.3s ease;
        }

        .search-input:focus {
            border-color: #4a90e2;
            outline: none;
        }

        .search-btn {
            padding: 10px 20px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-btn:hover {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>

    <!-- Include menu.php -->
    <?php include 'menu.php'; ?>

    <!-- Header -->
    <div class="header">
        <div class="scrolling-text">Selamat Datang di Halaman Artikel AMODA FEFU</div>
    </div>

    <!-- Form Pencarian -->
    <div class="search-container">
        <form method="GET" style="display: inline-block;">
            <input type="text" name="search" class="search-input" placeholder="Cari artikel..." value="<?php echo htmlspecialchars($searchTerm); ?>">
            <button type="submit" class="search-btn">Cari</button>
        </form>
    </div>

    <!-- Tampilkan tombol "Upload Artikel" jika pengguna sudah login -->
    <?php if ($loggedIn): ?>
        <a href="upload_article.php" class="upload-btn">Upload Artikel</a>
    <?php endif; ?>

    <div class="article-container">
        <?php
        if ($result->num_rows > 0) {
            while ($article = $result->fetch_assoc()) {
                ?>
                <div class="article-card">
                    <img src="article_image/omoda_fefu_logo.jpg" alt="Article Image" class="article-image">
                    <div class="article-content">
                        <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                        <p class="author">Oleh: <?php echo htmlspecialchars($article['fullname']); ?></p>
                        <p class="abstract">Abstrak: <?php echo htmlspecialchars($article['abstract']); ?></p>
                        <span class="read-more" data-pdf="<?php echo htmlspecialchars($article['file_path']); ?>" onclick="openModal(this)">Baca Selengkapnya</span>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>Tidak ada artikel ditemukan.</p>";
        }
        ?>
    </div>

    <!-- Modal untuk menampilkan PDF -->
    <div class="modal" id="myModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Detail Artikel</h3>
            <iframe id="pdfViewer" class="pdf-viewer" src="" frameborder="0"></iframe>
        </div>
    </div>

    <script>
        function openModal(element) {
            const modal = document.getElementById("myModal");
            const pdfViewer = document.getElementById("pdfViewer");
            pdfViewer.src = element.getAttribute("data-pdf");
            modal.style.display = "block";
        }

        function closeModal() {
            const modal = document.getElementById("myModal");
            const pdfViewer = document.getElementById("pdfViewer");
            pdfViewer.src = ""; // Clear PDF src
            modal.style.display = "none";
        }

        // Tutup modal saat diklik di luar modal
        window.onclick = function(event) {
            const modal = document.getElementById("myModal");
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
