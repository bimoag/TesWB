<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../admin/com/com-connect.php';

// membuat variabel untuk menampung data dari form
$newsTittle   = $_POST['newsTittle'];
$newsContent     = $_POST['newsContent'];
$newsDirectory    = "123";
$newsAuthor    = $_POST['newsAuthor'];
$newsCreatedAt    = date("Y-m-d H:i");
$newsDate    = $_POST['newsDate'];
$newsStatus    = $_POST['newsStatus'];
$newsPhoto = $_FILES['newsPhoto']['name'];


//cek dulu jika ada gambar news jalankan coding ini
if ($newsPhoto != "") {
    $ekstensi_allowed = array('png', 'jpg', 'PNG', 'JPG'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $newsPhoto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['newsPhoto']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $newsPhoto; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_allowed) === true) {
        move_uploaded_file($file_tmp, '../assets/newsp/' . $nama_gambar_baru); //memindah file gambar ke folder newsp
        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
        $query = "INSERT INTO news (newsTittle, newsContent, newsDirectory, newsPhoto, newsAuthor, newsCreatedAt, newsDate, newsStatus) VALUES ('$newsTittle', '$newsContent', '$newsDirectory', '$nama_gambar_baru', '$newsAuthor', '$newsCreatedAt', '$newsDate', '$newsStatus')";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            print "<script>alert('Data berhasil ditambah.');window.location='../admin/view-news.php';</script>";
            
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        print "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../admin/view-news.php;</script>";
        
    }
} else {
    $query = "INSERT INTO news (newsTittle, newsContent, newsDirectory, newsPhoto, newsAuthor, newsCreatedAt, newsDate, newsStatus) VALUES ('$newsTittle', '$newsContent', '$newsDirectory', NULL, '$newsAuthor', '$newsCreatedAt', '$newsDate', '$newsStatus')";
    $result = mysqli_query($conn, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        print "<script>alert('Data berhasil ditambah.');window.location='../admin/view-news.php';</script>";
        
    }
}
