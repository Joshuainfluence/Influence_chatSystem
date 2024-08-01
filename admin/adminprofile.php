<?php
require_once __DIR__ . "/adminHeader.php";
require_once __DIR__. "/../public/adminprofile.classes.php";
require_once __DIR__. "/../public/adminprofile.contr.php";
$username = "veecla";
$rows = new AdminProfileStaffContr($username);
$rows = $rows->adminStaffDisplay();
foreach ($rows as $row):
?>
<div class="container">
    <h1 class="h3 mb-2 text-gray-800">Admin Profile Page</h1>
    <p class="mb-4">All products of different categoreis <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    <div class="row gutters-sm">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="../inc/adminProfileUploads/<?= $row['image']?>" alt="Admin" width="400">
                        <div class="mt-3">
                            <h4>Victory Onyeonu</h4>
                            <p class="text-secondary mb-1">Chief Executive Officer</p>
                            <p class="text-muted font-size-sm">Asaba Delta State, Nigeria.</p>
                            <!-- <button class="btn btn-primary">Follow</button>
                        <button class="btn btn-outline-primary">Message</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $row['fullname']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Office</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?= $row['office']?>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            veeclaconcept@gmail.com
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            veecla
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            0810 585 6127
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            Delta State, Nigeria
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach?>

<?php
require_once __DIR__ . "/adminFooter.php";
?>