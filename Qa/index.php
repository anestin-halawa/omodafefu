<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>
    <!-- Link ke Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="path/to/favicon.ico" type="image/x-icon"> <!-- Ganti dengan path favicon Anda -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #ff6600, #ff9966);
            padding: 20px 5%;
            text-align: center;
            position: relative;
        }

        header h1 {
            color: white;
            font-size: 36px;
            margin: 0;
        }

        /* Nav */
        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #333;
            padding: 10px 5%;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: 600;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ff9966;
        }

        /* Section Layout */
        section {
            display: flex;
            flex-direction: column; /* Ubah menjadi kolom untuk mobile */
            align-items: center; /* Center align untuk mobile */
            padding: 40px 5%;
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            background: white;
            transition: transform 0.3s ease;
            opacity: 0; /* Memulai dengan opacity 0 untuk animasi */
            transform: translateY(20px); /* Menambahkan transformasi untuk animasi */
        }

        section:hover {
            transform: scale(1.02);
        }

        .content {
            max-width: 600px;
            text-align: center; /* Center align text untuk mobile */
            padding-right: 40px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 15px;
            color: #ff6600;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        /* Profile Image */
        .profile-image {
            width: 200px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid #ff6600;
            margin: 20px 0; /* Menambahkan margin untuk jarak pada mobile */
        }

        .profile-image img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .profile-image img:hover {
            transform: scale(1.1);
        }

        /* Proyek Terbaru */
        .projects {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 40px 5%;
        }

        .project-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            transition: transform 0.3s ease;
            width: calc(33% - 40px);
        }

        .project-card:hover {
            transform: translateY(-5px);
        }

        .project-card h3 {
            margin: 10px 0;
            font-size: 20px;
            color: #333;
        }

        /* Carousel */
        .carousel {
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
            overflow: hidden;
            position: relative;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-inner img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            flex-shrink: 0;
            border-radius: 15px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .carousel-indicators div {
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .carousel-indicators .active {
            background-color: #ff6600;
        }

        /* Media Queries */
        @media screen and (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 15px;
            }

            section {
                flex-direction: column; /* Memastikan section tetap kolom di tablet */
                text-align: center; /* Center align untuk tablet */
            }

            .projects {
                flex-direction: column;
                align-items: center;
            }

            .project-card {
                width: 90%; /* Memastikan kartu proyek lebar 90% pada mobile */
            }
        }

        @media screen and (max-width: 480px) {
            h1 {
                font-size: 28px;
            }

            h2 {
                font-size: 20px;
            }

            p {
                font-size: 16px;
            }

            .profile-image {
                width: 150px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>SELAMAT DATANG DI WEBSITE OMODA FEFU</h1>
    </header>

    <!-- Include menu.php -->
    <?php include 'menu.php'; ?>

    <section>
        <div class="content">
            <h2>Hai, Ini Saya</h2>
            <h1>Saya Anestin Halawa</h1>
            <p>Saya seorang Pengembang Web Profesional. Tujuan utama saya adalah membantu & memuaskan klien lokal & global dengan solusi pengembangan web.</p>
        </div>
        <div class="profile-image">
            <img src="foto profil/1.jpeg" alt="Foto Profil Anestin Halawa">
        </div>
    </section>

    <!-- Image Carousel -->
    <div class="carousel">
        <div class="carousel-inner">
            <img src="section2/a.jpeg" alt="Slide 1">
            <img src="section2/a2.jpg" alt="Slide 2">
            <img src="section2/a3.jpeg" alt="Slide 3">
        </div>
        <div class="carousel-control-prev" onclick="prevSlide()">&#10094;</div>
        <div class="carousel-control-next" onclick="nextSlide()">&#10095;</div>
        <div class="carousel-indicators">
            <div onclick="setSlide(0)" class="active"></div>
            <div onclick="setSlide(1)"></div>
            <div onclick="setSlide(2)"></div>
        </div>
    </div>

    <div class="projects">
        <h2>Proyek Terbaru</h2>
        <div class="project-card">
            <h3>Website E-commerce</h3>
            <p>Pengembangan website untuk platform e-commerce dengan berbagai fitur menarik.</p>
        </div>
        <div class="project-card">
            <h3>Aplikasi Web Interaktif</h3>
            <p>Aplikasi web yang interaktif dan responsif untuk meningkatkan pengalaman pengguna.</p>
        </div>
        <div class="project-card">
            <h3>Portal Berita</h3>
            <p>Portal berita dengan desain yang modern dan mudah digunakan untuk pembaca.</p>
        </div>
    </div>

    <!-- Include footer.php -->
    <?php include 'footer.php'; ?>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-inner img');

        function showSlide(index) {
            if (index < 0) {
                currentSlide = slides.length - 1;
            } else if (index >= slides.length) {
                currentSlide = 0;
            } else {
                currentSlide = index;
            }
            const offset = -currentSlide * 100; // Adjust to slide width
            document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
            updateIndicators();
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function setSlide(index) {
            showSlide(index);
        }

        function updateIndicators() {
            const indicators = document.querySelectorAll('.carousel-indicators div');
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlide);
            });
        }

        // Scroll Event for Navbar
        window.onscroll = function() {
            const nav = document.querySelector('nav');
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        };

        // Animasi saat halaman dimuat
        window.onload = function() {
            const sections = document.querySelectorAll('section, .projects');
            sections.forEach((section, index) => {
                setTimeout(() => {
                    section.style.opacity = 1;
                    section.style.transform = 'translateY(0)';
                }, index * 500); // Delay untuk setiap elemen
            });
        };
    </script>
</body>
</html>
