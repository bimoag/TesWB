<?php
// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "teswb_db");

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>