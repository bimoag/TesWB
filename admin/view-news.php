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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
                            print "Halo, " . $_SESSION['adminName'] . "!"; // Menampilkan pesan dengan nama admin
                            ?>
                        </h1>
                    </div>

                    <!-- Content Row -->

                    <!-- DataTales Example -->
                    <div class="mx-auto w-auto mb-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddNews" data-whatever="@mdo">Add News</button>
                    </div>
                    <!-- modal add news-->
                    <script type="text/javascript" src="../javascript/ckeditor/ckeditor.js"></script>
                    <div class="modal fade" id="modalAddNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label class="col-form-label">Title:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Content:</label>
                                            <textarea class="ckeditor" id="ckedtor" name="newsContent"></textarea>
                                            <!-- <textarea class="form-control" rows="6" cols="100" id="message-text"></textarea> -->
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Author:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Date:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Photo:</label>
                                            <input type="file">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Status:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal add news -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data News</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tittle</th>
                                            <th style="width: 20%">News Content</th>
                                            <th>Directory</th>
                                            <th>Photo</th>
                                            <th>Author</th>
                                            <th>News Date</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'com/com-connect.php';
                                        $no = 1;
                                        $data = mysqli_query($conn, "select * from news order by newsId desc");
                                        while ($dataNews = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php print $no++; ?></td>
                                                <td><?php print $dataNews['newsTittle']; ?></td>
                                                <td><?php print substr($dataNews['newsContent'], 0, 150); ?> ...</td>
                                                <td><?php print $dataNews['newsDirectory']; ?></td>
                                                <td><?php print $dataNews['newsPhoto']; ?></td>
                                                <td><?php print $dataNews['newsAuthor']; ?></td>
                                                <td><?php print $dataNews['newsDate']; ?></td>
                                                <td><?php print $dataNews['newsCreatedAt']; ?></td>
                                                <td>
                                                    <?php if ($dataNews['newsStatus'] == 1) {
                                                        print 'Show';
                                                    } else {
                                                        print 'Hide';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit"><i class="bi bi-pencil"></i></button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" id="sa-params"><i class="bi bi-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


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