<?php
// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <!-- Link ke Font Awesome untuk ikon sosial media -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            scroll-behavior: smooth;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #fff;
            padding: 40px 5%; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 50px; 
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            font-size: 20px;
            position: relative;
            padding: 10px 0;
        }

        nav ul li a::after {
            content: "";
            display: block;
            width: 0;
            height: 3px;
            background: #ff6600;
            transition: width 0.3s ease;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        /* About Section */
        .about-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 40px 5%;
            max-width: 100%;
            background: linear-gradient(135deg, #f0a500, #ffe259);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(20px);
            opacity: 0;
            animation: fadeIn 1s ease forwards;
            margin-top: 40px;
        }

        .about-section h1 {
            font-size: 36px;
            color: azure;
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 18px;
            line-height: 1.8;
            color: black;
            margin-bottom: 20px;
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media screen and (max-width: 768px) {
            .about-section {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            .about-section h1 {
                font-size: 28px;
            }

            .about-section p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Include menu.php -->
    <?php include 'menu.php'; ?>

    <!-- About Section -->
    <section class="about-section">
        <div>
            <h1>Tentang Saya</h1>
            <p>Saya adalah seorang pengembang web profesional dengan keahlian dalam menciptakan solusi digital yang inovatif untuk membantu bisnis tumbuh di era digital ini. Dengan pengalaman bertahun-tahun dalam industri teknologi, saya selalu berusaha memberikan yang terbaik bagi klien saya.</p>
            <p>Saya mahir dalam berbagai bahasa pemrograman seperti HTML, CSS, PHP, JavaScript, dan framework modern. Saya juga selalu mengikuti perkembangan teknologi terbaru untuk memastikan proyek yang saya kerjakan selalu up-to-date dengan tren industri.</p>
            <p>Saya percaya bahwa kolaborasi adalah kunci keberhasilan, dan saya senang bekerja sama dengan tim atau secara individu untuk menciptakan sesuatu yang luar biasa.</p>
        </div>
    </section>

    <!-- Include footer.php -->
    <?php include 'footer.php'; ?>

</body>
</html>
