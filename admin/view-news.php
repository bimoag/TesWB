<?php
include 'com/com-connect.php';
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

    <?php include 'com/com-css.php'; ?>





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
                                    <form method="POST" action="../modz/news-input.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-form-label">Title:</label>
                                            <input type="text" name="newsTittle" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Content:</label>
                                            <textarea class="ckeditor" id="ckedtor" name="newsContent" required=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Author:</label>
                                            <input type="text" name="newsAuthor" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Date:</label>
                                            <input type="date" name="newsDate" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Photo:</label>
                                            <div class="custom-file">
                                                <input type="file" name="newsPhoto" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Status:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="newsStatus" value="1" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">Show</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="newsStatus" value="0" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">Hide</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
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
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?php print $dataNews['newsId']; ?>"><i class="bi bi-pencil"></i></button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php print $dataNews['newsId']; ?>" id="sa-params"><i class="bi bi-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- modal hapus -->
                    <?php
                    $data = mysqli_query($conn, "select * from news order by newsId desc");
                    while ($dataNews = mysqli_fetch_array($data)) {
                    ?>
                        <div class="modal fade" id="modal-delete<?php print $dataNews['newsId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete News?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Are you sure want to delete Tittle : <?php print $dataNews['newsTittle']; ?></div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="../modz/news-delete.php?newsId=<?php print $dataNews['newsId']; ?>">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- tutup modal hapus -->
                    <!-- modal edit news-->
                    <?php
                    $data = mysqli_query($conn, "select * from news order by newsId desc");
                    while ($dataNews = mysqli_fetch_array($data)) {
                    ?>
                        <script type="text/javascript" src="../javascript/ckeditor/ckeditor.js"></script>
                        <div class="modal fade" id="modal-edit<?php print $dataNews['newsId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit News</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="../modz/edit-input.php" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-form-label">Title:</label>
                                                <input type="hidden" name="newsId" value="<?php echo $dataNews['newsId']; ?>" class="form-control" required="">
                                                <input type="text" name="newsTittle" value="<?php echo $dataNews['newsTittle']; ?>" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Content:</label>
                                                <textarea class="ckeditor" id="ckedtor" name="newsContent" required=""><?php echo $dataNews['newsContent']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Author:</label>
                                                <input type="text" name="newsAuthor" value="<?php echo $dataNews['newsAuthor']; ?>" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Date:</label>
                                                <input type="date" name="newsDate" class="form-control" value="<?php echo $dataNews['newsDate']; ?>" required="">
                                            </div>
                                            <div class="input-group date" id="datepicker">
                                                <label class="col-form-label">Photo:</label>
                                                <input type="file" name="newsPhoto" value="<?php echo $dataNews['newsPhoto']; ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Status:</label>
                                                <?php if ($dataNews['newsStatus'] == 1) { ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="newsStatus" value="1" id="flexRadioDefault1" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">Show</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="newsStatus" value="0" id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">Hide</label>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="newsStatus" value="1" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">Show</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="newsStatus" value="0" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">Hide</label>
                                                    </div>
                                                <?php } ?>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- end modal edit news -->

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



    <?php include 'com/com-js.php'; ?>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

</body>

</html>