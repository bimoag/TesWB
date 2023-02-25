<?php 
 
session_start();
 
if (!isset($_SESSION['adminUsername'])) {
    header("Location: login.php");
}
 

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Adm</title>

  <!-- Custom fonts for this template-->
  <link href="../javascript/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../style/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="../javascript/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'com/com-sidebar.php' ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'com/com-header.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
              <?php
              if(isset($_SESSION['adminName'])) { // Memeriksa apakah session 'adminname' telah diset atau belum
                $adminName = $_SESSION['adminName'];
                print "Halo, " . $adminName . "!"; // Menampilkan pesan dengan nama admin
              } else {
                print "Session tidak ditemukan"; // Menampilkan pesan jika session tidak ditemukan
              } 
              ?>
            </h1>
          </div>

          <!-- Content Row -->

          <?php include 'page/view-admin.php' ?>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'com/com-footer.php' ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="../javascript/vendor/jquery/jquery.min.js"></script>
  <script src="../javascript/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../javascript/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../javascript/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../javascript/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../javascript/js/demo/chart-area-demo.js"></script>
  <script src="../javascript/js/demo/chart-pie-demo.js"></script>
  <script src="../javascript/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../javascript/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../javascript/js/demo/datatables-demo.js"></script>

</body>

</html>