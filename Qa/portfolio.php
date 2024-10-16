<?php
session_start();
include 'koneksi.php'; // Koneksi ke database

// Ambil data portofolio dari database (jika ada)
$query = "SELECT * FROM portofolio";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
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

        /* Portfolio Container */
        .portfolio-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .portfolio-item {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: calc(33.333% - 20px);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .portfolio-item:hover {
            transform: translateY(-5px);
        }

        .portfolio-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .portfolio-item h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #333;
        }

        .portfolio-item p {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
        }

        .portfolio-item a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4e54c8;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .portfolio-item a:hover {
            background-color: #e74c3c;
        }

        @media (max-width: 768px) {
            .portfolio-item {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .portfolio-item {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <!-- Include menu.php -->
    <?php include 'menu.php'; ?>

    <!-- Portfolio Section -->
    <div class="portfolio-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="portfolio-item">
                    <img src="<?php echo $row['image_path']; ?>" alt="Portofolio">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <a href="portfolio_detail.php?id=<?php echo $row['id']; ?>">Lihat Detail</a>
                </div>
                <?php
            }
        } else {
            echo "<p>Tidak ada portofolio yang ditemukan.</p>";
        }
        ?>
    </div>

</body>
</html>
