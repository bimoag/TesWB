<?php
include '../admin/com/com-connect.php';
$id = $_GET["newsId"];
//mengambil id yang ingin dihapus

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM news WHERE newsId='$id' ";
$hasil_query = mysqli_query($conn, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
    die("Gagal menghapus data: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='../admin/view-news.php';</script>";
}
