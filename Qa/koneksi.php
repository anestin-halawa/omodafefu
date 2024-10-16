<?php
// Konfigurasi database
$host     = "localhost";   // Nama host, biasanya "localhost"
$username = "root";        // Username MySQL, default "root"
$password = "";            // Password MySQL, kosongkan jika tidak ada
$dbname   = "labalaba";    // Nama database yang akan digunakan

// Membuat koneksi ke database MySQL
$koneksi = new mysqli($host, $username, $password, $dbname);

// Cek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
