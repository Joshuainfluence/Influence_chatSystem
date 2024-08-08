<?php
require_once __DIR__ . "/adminHeader.php";
require_once __DIR__ . "/../public/userEdit.classes.php";
require_once __DIR__ . "/../public/userEdit.contr.php";
$unique_id = $_GET['unique_id'];
$y = "";
$z = "";
$rows = new UserEditContr($unique_id, $y, $z);
$rows = $rows->editUser();
foreach ($rows as $row) :
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card table-responsive shadow">
                    <div class="card-header">
                        <h4><?= ucfirst($row['fname']) . " " . ucfirst($row['lname']) ?></h4>

                    </div>
                    <div class="card-body">

                        <!-- <h3>Profile image</h3> -->
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <img src="../include/profileUploads/<?= $row['profileImage'] ?>" class="img-fluid" alt="">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="card table-responsive">
                                    <div class="card-body">
                                        <h5 class="text-success">Account details</h5>
                                        <form action="../include/userEdit.include.php" method="post">

                                            <div class="row d-flex">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            FullName
                                                        </td>
                                                        <td>
                                                            <?= ucfirst($row['fname']) . " " . ucfirst($row['lname']) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-100">
                                                            Email
                                                        </td>
                                                        <td>
                                                            <?= ucfirst($row['email']) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Account
                                                        </td>
                                                        <td>
                                                            <?= ucfirst($row['account']) ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Verification Code
                                                        </td>
                                                        <td>
                                                            <?= ucfirst($row['vcode']) ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Member since
                                                        </td>
                                                        <td>
                                                            <?= $row['date_registered']?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Account state
                                                        </td>
                                                        <td>
                                                            <select name="account" id="" class="form-control">
                                                                <option value="verified">Verified</option>
                                                                <option value="registered">Registered</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Verification Code
                                                        </td>
                                                        <td>
                                                            <select name="vcode" id="" class="form-control">
                                                                <option value="enabled">Enable</option>
                                                                <option value="disable">Disable</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                </table>


                                            </div>
                                            <input type="hidden" name="unique_id" value="<?= $unique_id?>">

                                            <input type="submit" value="save" class="btn btn-dark w-100">

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach ?>



    <!-- Bootstrap core JavaScript-->
    <script src="../assets/js/userEdit.js"></script>
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