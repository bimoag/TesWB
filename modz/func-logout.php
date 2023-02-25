<?php

include '../admin/com/com-connect.php';

session_start();

// update data ke database
date_default_timezone_set("Asia/Bangkok");

if (isset($_SESSION['adminId'])) {
    $lastLogin = date("Y-m-d H:i");
    $adminId = $_SESSION['adminId'];
    mysqli_query($conn, "update admin SET adminLastLogin='$lastLogin' where adminId='$adminId'");

    session_destroy();
    header("Location: ../admin/login.php");
} else {
    echo "Session tidak ditemukan";
}
