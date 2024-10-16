<?php
// Pastikan tidak ada output sebelum session_start

// Include koneksi database
include 'koneksi.php'; 

// Cek apakah user sudah login
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>
<nav>
    <div class="nav-container">
        <!-- Daftar menu (untuk desktop) -->
        <ul id="navMenu">
            <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="about.php"><i class="fas fa-user"></i> About</a></li>
            <li><a href="skills.php"><i class="fas fa-code"></i> Skills</a></li>
            <li><a href="article.php"><i class="fas fa-newspaper"></i> Artikel</a></li>
            <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>

            <!-- Kondisi untuk menampilkan menu berdasarkan status login -->
            <?php if ($loggedIn): ?>
                <li><a href="#"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['fullname']; ?></a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            <?php else: ?>
                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li><a href="register.php"><i class="fas fa-user-plus"></i> Registrasi</a></li>
            <?php endif; ?>
        </ul>

        <!-- Ikon Hamburger -->
        <div class="hamburger-menu" id="hamburgerMenu">
            <i class="fas fa-bars"></i>
        </div>
    </div>

    <style>
        nav {
            background-color: darkolivegreen;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            text-decoration: none;
            color: #ecf0f1;
            font-size: 16px;
            font-weight: 600;
            padding: 10px 20px;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 30px;
        }

        nav ul li a:hover {
            background-color: #e74c3c;
            color: #fff;
        }

        nav ul li a i {
            margin-right: 8px;
        }

        /* Hamburger menu */
        .hamburger-menu {
            display: none;
            cursor: pointer;
            font-size: 24px;
            color: #ecf0f1;
        }

        /* Responsif untuk tampilan mobile */
        @media (max-width: 768px) {
            .hamburger-menu {
                display: block;
                position: absolute;
                right: 20px;
                top: 15px;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
                display: none;
            }

            nav ul.active {
                display: flex;
            }

            nav ul li {
                display: block;
                width: 100%;
            }

            nav ul li a {
                text-align: center;
                display: block;
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</nav>

<!-- Link ke Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Script untuk hamburger menu -->
<script>
    // Fungsi untuk toggle (menampilkan/menyembunyikan) menu saat hamburger di-klik
    document.getElementById('hamburgerMenu').addEventListener('click', function() {
        var navMenu = document.getElementById('navMenu');
        navMenu.classList.toggle('active'); // Menambahkan atau menghapus class 'active'
    });
</script>
