<?php
require_once __DIR__ . "/adminHeader.php";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card table-responsive shadow">
                <div class="card-header">
                    <h4>Roman Reings</h4>

                </div>
                <div class="card-body">

                    <!-- <h3>Profile image</h3> -->
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <img src="../assets/img/roman.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="card table-responsive">
                                <div class="card-body">
                                    <h5 class="text-success">Account details</h5>
                                    <form action="" method="post">
                                    
                                    <div class="row d-flex">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                           <tr>
                                                <td>
                                                    FullName
                                                </td>
                                                <td>
                                                    Joshua
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-100">
                                                    Email
                                                </td>
                                                <td>
                                                    Joshuajulius2030@gmail.com
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Status
                                                </td>
                                                <td>
                                                    Verified
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Member since
                                                </td>
                                                <td>
                                                    Joshua
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Account state
                                                </td>
                                                <td>
                                                    <select name="" id="" class="form-control bg-dark text-light">
                                                        <option value="">Verified</option>
                                                        <option value="">Register</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Verification Code
                                                </td>
                                                <td>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Enable</option>
                                                        <option value="">Disable</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                        

                                    </div>
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