<?php
include '../admin/com/com-connect.php';
$id = $_GET["adminId"];
//mengambil id yang ingin dihapus

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM admin WHERE adminId='$id' ";
$hasil_query = mysqli_query($conn, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
    die("Gagal menghapus data: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='../admin/view-admin.php';</script>";
}
