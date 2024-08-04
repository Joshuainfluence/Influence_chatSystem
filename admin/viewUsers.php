<?php 
    require_once __DIR__. "/adminHeader.php";
    require_once __DIR__. "/../public/adminuser.classes.php";
    require_once __DIR__. "/../public/adminuser.contr.php";
    $x = "registered";
    $y = "verified";
    $rows = new AdminUserContr($x, $y);
    $rows = $rows->userAdmin();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 fw-bold">INFLUENCE CHAT APP</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                         
                            <th>E-mail</th>
                            <th>Start date</th>
                            <th>Status</th>
                            <th>Account</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Image</th>

                        </tr>
                    </tfoot> -->
                    <tbody>
                        <?php 
                            foreach($rows as $row):
                        
                        ?>
                        <tr>
                            <td class="w-100"><a href="userEdit.php?unique_id=<?= $row['unique_id']?>"><?= ucfirst($row['fname'])?> <?= ucfirst($row['lname'])?></a></td>
           
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['date_registered'] ?></td>

                            <td><?= $row['last_activity'] < 300 ? "<div class='alert alert-success shadow'>Online</div>" : "<div class='alert alert-danger shadow'>Offline</div>" ?></td>
                            <td><?= $row['account'] ?></td>
                            
                            <td><a href="deleteUser.inc.php?id=<?= $row['id']; ?>" class="btn-del btn alert-danger shadow"><i class="fa fa-trash"></i></a></td>
                            <td><a href="delete_users.php?id=<?= $row['id']; ?>" class="btn-del btn alert-warning shadow"><i class="fa fa-edit"></i></a></td>


                            <td><img style="width:120px; height:120px;" src="../include/profileUploads/<?= $row['profileImage']; ?>" alt=""></td>
                        </tr>
                        <?php endforeach?>
                       
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
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../config/logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>