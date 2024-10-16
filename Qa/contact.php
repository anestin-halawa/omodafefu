<?php
session_start();
include 'koneksi.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Simpan ke database
    $query = "INSERT INTO kontak (name, email, company, phone, message) VALUES ('$name', '$email', '$company', '$phone', '$message')";
    
    if ($koneksi->query($query) === TRUE) {
        // Jika berhasil simpan ke database, kirim ke WhatsApp
        $whatsapp_number = '6281264084871'; // Nomor WA, ganti 0 dengan 62 untuk format internasional
        $text = "Nama: $name%0AEmail: $email%0APerusahaan: $company%0ATelepon: $phone%0APesan: $message";
        
        // Redirect ke link WhatsApp
        header("Location: https://api.whatsapp.com/send?phone=$whatsapp_number&text=$text");
        exit();
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        /* Navigation Bar */
        nav {
            display: flex;
            justify-content: center;
            background-color: #4e54c8;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
            color: #ff6600;
        }

        /* Main Contact Section */
        .contact-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            flex-wrap: wrap; /* Menambahkan ini untuk memudahkan tata letak responsif */
        }

        /* Contact Info Section */
        .contact-info {
            flex: 1 1 40%; /* Memperbolehkan lebar elemen ini disesuaikan */
            padding-right: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .contact-info h2 {
            font-size: 28px;
            color: #4e54c8;
            margin-bottom: 10px;
        }

        .contact-info p {
            font-size: 16px;
            line-height: 1.6;
            color: #666;
        }

        .contact-info div {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .contact-info div i {
            font-size: 20px;
            color: #4e54c8;
        }

        /* Contact Form Section */
        .contact-form {
            flex: 1 1 55%; /* Memperbolehkan lebar elemen ini disesuaikan */
        }

        .contact-form h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #4e54c8;
        }

        .contact-form form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-form input:focus, .contact-form textarea:focus {
            border-color: #4e54c8;
            box-shadow: 0 0 8px rgba(78, 84, 200, 0.2);
            outline: none;
        }

        .contact-form button {
            padding: 15px;
            background-color: #4e54c8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #ff6600;
            transform: scale(1.05);
        }

        /* Icons (Using Font Awesome) */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

        .contact-info div i {
            font-size: 24px;
            color: #4e54c8;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .contact-section {
                flex-direction: column; /* Mengubah tata letak menjadi kolom */
                align-items: center;
                text-align: center;
                padding: 20px; /* Mengurangi padding pada tampilan mobile */
            }

            .contact-info, .contact-form {
                width: 100%; /* Membuat elemen lebar 100% */
                padding: 10px; /* Mengurangi padding pada elemen */
            }

            .contact-info {
                padding-right: 0; /* Menghilangkan padding kanan pada tampilan mobile */
            }

            .contact-info h2, .contact-form h2 {
                font-size: 24px; /* Mengurangi ukuran font di mobile */
            }

            .contact-form input, .contact-form textarea {
                padding: 12px; /* Mengurangi padding di input dan textarea */
                font-size: 14px; /* Mengurangi ukuran font di input dan textarea */
            }

            .contact-form button {
                font-size: 16px; /* Mengurangi ukuran font pada tombol */
            }
        }
    </style>
</head>
<body>

    <!-- Include menu.php -->
    <?php include 'menu.php'; ?>

    <!-- Contact Section -->
    <div class="contact-section">
        <!-- Contact Info Section -->
        <div class="contact-info">
            <h2>Hubungi Kami</h2>
            <p>Jika Anda memiliki pertanyaan atau ingin menghubungi kami, Anda dapat mengisi formulir di sebelah atau menggunakan detail kontak di bawah ini.</p>
            <div>
                <i class="fas fa-map-marker-alt"></i>
                <p>HalawaTECH, Sumatra Utara, Indonesia</p>
            </div>
            <div>
                <i class="fas fa-phone"></i>
                <p>(+62) 812 6408 4871</p>
            </div>
            <div>
                <i class="fas fa-envelope"></i>
                <p>omodafefu@gmail.com</p>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="contact-form">
            <h2>Kirim Pesan</h2>
            <form action="contact.php" method="POST">
                <input type="text" name="name" placeholder="Nama" required>
                <input type="email" name="email" placeholder="Alamat Email" required>
                <input type="text" name="company" placeholder="Perusahaan" required>
                <input type="text" name="phone" placeholder="Telepon" required>
                <textarea name="message" placeholder="Pesan" rows="6" required></textarea>
                <button type="submit">KIRIM</button>
            </form>
        </div>
    </div>

    <!-- Google Maps Embed -->
    <div style="margin: 50px auto; max-width: 1200px; text-align: center;">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15861.19685665483!2d98.7248467!3d3.6364862!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303133005c068a05%3A0x67f2e5452d8a4d34!2shalawaTECH!5e0!3m2!1sen!2sid!4v1639496349991!5m2!1sen!2sid" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</body>
</html>
