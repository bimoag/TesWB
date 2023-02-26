<?php
include '../admin/com/com-connect.php';

session_start();

if (isset($_POST['submit'])) {
    $adminUsername = $_POST['adminUsername'];
    $adminPassword = $_POST['adminPassword'];

    $sql = "SELECT * FROM admin WHERE adminUsername='$adminUsername' AND adminPassword='$adminPassword' AND adminStatus='1'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['adminUsername'] = $data['adminUsername'];
        $_SESSION['adminName'] = $data['adminName'];
        $_SESSION['adminId'] = $data['adminId'];
        header("Location: ../admin/index.php");
    } else {
        header("location:../admin/login.php?pesan=Gagal login! User tidak aktif / tidak ditemukan.");
    }
}
