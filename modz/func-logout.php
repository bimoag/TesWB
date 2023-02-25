<?php
session_start();

// update data ke database
date_default_timezone_set("Asia/Bangkok");

if (isset($_SESSION['adminUsername'])) { 
    $lastLogin = date("Y-m-d");
    $adminUsername = $_SESSION['adminUsername'];
    mysqli_query($conn, "update admin SET adminLastLogin='$lastLogin' where adminUsername='$adminUsername'");
    
    session_destroy();
    header("Location: ../admin/login.php");
} else {
    echo "Session tidak ditemukan"; 
}



