<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../admin/com/com-connect.php';

// membuat variabel untuk menampung data dari form
$id = $_POST['adminId'];
$adminPassword    = $_POST['adminPassword'];

$query  = "UPDATE admin SET adminPassword = '$adminPassword' WHERE adminId='$id'";
$result = mysqli_query($conn, $query);
// periska query apakah ada error
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Data berhasil diubah.');window.location='../admin/view-admin.php';</script>";
}
