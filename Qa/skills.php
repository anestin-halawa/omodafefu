<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills</title>
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

        /* Skills Container */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Kurangi gap untuk tampilan lebih kecil */
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .skills-item {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: calc(25% - 10px); /* Sesuaikan ukuran grid agar lebih kecil */
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .skills-item:hover {
            transform: translateY(-5px);
        }

        .skills-item i {
            font-size: 36px; /* Ukuran ikon lebih kecil */
            margin-bottom: 10px;
            color: #4e54c8;
        }

        .skills-item h3 {
            font-size: 20px; /* Ukuran teks lebih kecil */
            margin-bottom: 10px;
            color: #333;
        }

        .skills-item p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        /* Responsive Styling */
        @media (max-width: 1024px) {
            .skills-item {
                width: calc(33.333% - 10px); /* Grid untuk tablet */
            }
        }

        @media (max-width: 768px) {
            .skills-item {
                width: calc(50% - 10px); /* Grid untuk mobile lebih besar */
            }
        }

        @media (max-width: 480px) {
            .skills-item {
                width: 100%; /* Full width untuk layar yang lebih kecil */
            }
        }
    </style>

    <!-- Link ke Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- Include menu.php -->
    <?php include 'menu.php'; ?>

    <!-- Skills Section -->
    <div class="skills-container">
        <div class="skills-item">
            <i class="fas fa-code"></i>
            <h3>Pemrograman Web</h3>
            <p>Terampil dalam mengembangkan aplikasi web menggunakan HTML, CSS, JavaScript, PHP, dan framework seperti Laravel dan Django.</p>
        </div>

        <div class="skills-item">
            <i class="fas fa-database"></i>
            <h3>Basis Data</h3>
            <p>Berpengalaman dalam merancang dan mengelola database menggunakan MySQL, PostgreSQL, serta optimasi query untuk performa yang lebih baik.</p>
        </div>

        <div class="skills-item">
            <i class="fas fa-network-wired"></i>
            <h3>Jaringan Komputer</h3>
            <p>Memahami dasar-dasar jaringan komputer, termasuk konfigurasi server, keamanan jaringan, dan pengelolaan infrastruktur TI.</p>
        </div>

        <div class="skills-item">
            <i class="fas fa-laptop-code"></i>
            <h3>Pemrograman Berorientasi Objek (OOP)</h3>
            <p>Memiliki keahlian dalam OOP menggunakan bahasa pemrograman seperti Python, Java, dan C++, serta penerapan pola desain yang efisien.</p>
        </div>

        <div class="skills-item">
            <i class="fas fa-server"></i>
            <h3>DevOps & Cloud Computing</h3>
            <p>Memahami konsep DevOps, serta berpengalaman dalam menggunakan platform cloud seperti AWS, Docker, dan CI/CD pipelines.</p>
        </div>

        <div class="skills-item">
            <i class="fas fa-shield-alt"></i>
            <h3>Keamanan Informasi</h3>
            <p>Mengerti konsep keamanan informasi dan jaringan, termasuk enkripsi, otentikasi, dan teknik mitigasi serangan siber.</p>
        </div>

        <div class="skills-item">
            <i class="fas fa-mobile-alt"></i>
            <h3>Pemrograman Mobile</h3>
            <p>Terampil dalam pengembangan aplikasi mobile menggunakan Android Studio, Kotlin, serta pemrograman hybrid seperti Flutter.</p>
        </div>

        <div class="skills-item">
            <i class="fas fa-robot"></i>
            <h3>Kecerdasan Buatan (AI) & Pembelajaran Mesin</h3>
            <p>Memahami konsep AI dan machine learning menggunakan Python, termasuk penggunaan library seperti TensorFlow dan Scikit-learn.</p>
        </div>

        <div class="skills-item">
            <i class="fas fa-project-diagram"></i>
            <h3>Manajemen Proyek</h3>
            <p>Memiliki pengalaman dalam manajemen proyek teknologi informasi menggunakan metodologi Agile dan Scrum.</p>
        </div>
    </div>

</body>
</html>
