<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../admin/com/com-connect.php';

// membuat variabel untuk menampung data dari form
$adminName   = $_POST['adminName'];
$adminUsername     = $_POST['adminUsername'];
$adminPassword    = $_POST['adminPassword'];
$adminRegistredDate    = date('Y-m-d H:i');


$query = "INSERT INTO admin (adminName, adminUsername, adminPassword, adminRegistredDate, adminLastLogin, adminStatus) VALUES ('$adminName', '$adminUsername', '$adminPassword', '$adminRegistredDate', null, '1')";
$result = mysqli_query($conn, $query);
// periska query apakah ada error
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Data berhasil ditambah.');window.location='../admin/view-admin.php';</script>";
}
