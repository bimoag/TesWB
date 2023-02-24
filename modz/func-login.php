<?php
include '../admin/com/com-connect.php';

session_start();

class Login
{
    private $adminUsername;
    private $adminPassword;

    public function __construct($adminUsername, $adminPassword)
    {
        $this->adminUsername = $adminUsername;
        $this->adminPassword = $adminPassword;
    }

    public function validate()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'teswb_db');

        $query = mysqli_query($conn, "SELECT * FROM admin WHERE adminUsername='$this->adminUsername' AND adminPassword='$this->adminPassword'");

        if (mysqli_num_rows($query) == 1) {
            return true;
        } else {
            return false;
        }
    }
}

// Menggunakan class Login untuk melakukan validasi login
$adminUsername = $_POST['adminUsername'];
$adminPassword = $_POST['adminPassword'];

$login = new Login($adminUsername, $adminPassword);

if ($login->validate()) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("Location: ../admin/index.php");
} else {
    print '<script>alert("Message")</script>';
}
