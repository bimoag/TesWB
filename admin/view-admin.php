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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddAdmin" data-whatever="@mdo">Add admin</button>
          </div>
          <!-- modal add admin-->
          <div class="modal fade" id="modalAddAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="../modz/admin-input.php">
                    <div class="form-group">
                      <label class="col-form-label">Name:</label>
                      <input type="text" name="adminName" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Username:</label>
                      <input type="text" name="adminUsername" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Password:</label>
                      <input type="text" name="adminPassword" class="form-control" required="">
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
          <!-- end modal add admin -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Registred Date</th>
                      <th>Last Login</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($conn, "select * from admin order by adminId");
                    while ($dataAdmin = mysqli_fetch_array($data)) {
                    ?>
                      <tr>
                        <td><?php print $no++; ?></td>
                        <td><?php print $dataAdmin['adminName']; ?></td>
                        <td><?php print $dataAdmin['adminUsername']; ?></td>
                        <td><?php print $dataAdmin['adminRegistredDate']; ?></td>
                        <td>
                          <?php if (!isset($dataAdmin['adminLastLogin'])) {
                            print 'Not Login Yet';
                          } else {
                            print $dataAdmin['adminLastLogin'];
                          }
                          ?>
                        </td>
                        <td>
                          <?php if ($dataAdmin['adminStatus'] == 1) {
                            print 'Active';
                          } else {
                            print 'Not Active';
                          }
                          ?>
                        </td>
                        <td>
                          <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?php print $dataAdmin['adminId']; ?>"><i class="bi bi-pencil"></i></button>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php print $dataAdmin['adminId']; ?>" id="sa-params"><i class="bi bi-trash"></i></button>
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
          $data = mysqli_query($conn, "select * from admin order by adminId");
          while ($dataAdmin = mysqli_fetch_array($data)) {
          ?>
            <div class="modal fade" id="modal-delete<?php print $dataAdmin['adminId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Admin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Are you sure want to delete Username : <?php print $dataAdmin['adminUsername']; ?></div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../modz/admin-delete.php?adminId=<?php print $dataAdmin['adminId']; ?>">Yes</a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- tutup modal hapus -->
          <!-- modal edit admin-->
          <?php
          $data = mysqli_query($conn, "select * from admin order by adminId");
          while ($dataAdmin = mysqli_fetch_array($data)) {
          ?>
            <div class="modal fade" id="modal-edit<?php print $dataAdmin['adminId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="../modz/admin-edit.php">
                      <div class="form-group">
                        <label class="col-form-label">Password:</label>
                        <input type="hidden" name="adminId" value="<?php echo $dataAdmin['adminId']; ?>" class="form-control" required="">
                        <input type="text" name="adminPassword" value="<?php echo $dataAdmin['adminPassword']; ?>" class="form-control" required="">
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
          <!-- end modal edit admin -->
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

</body>

</html>