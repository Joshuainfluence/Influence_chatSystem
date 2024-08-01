<?php
require_once __DIR__ . "/adminHeader.php";
require_once __DIR__ . "/../public/socials.classes.php";
require_once __DIR__ . "/../public/socials.contr.php";

$id = 0;
$rows = new SocialDisplayContr($id);
$rows = $rows->displaySocials();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Social | Media</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
    <p class="mb-2">DataTables is a third party plugin that is used to generate the demo table below.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Topic</th>

                            <th>Content</th>
                            <th>Image</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            <!-- <th>Image</th> -->
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
                        foreach ($rows as $row) :

                        ?>
                            <tr>
                                <td><?= $row['topic'] ?></td>

                                <td><?= $row['link'] ?></td>
                                
                                <td><img style="width:120px; height:120px;" src="../inc/socialUploads/<?= $row['postImage']?>" alt=""></td>

                                <!-- <td><a href="deleteUser.inc.php?id=<?= $row['id']; ?>" class="btn-del btn alert-success shadow"><i class="fa fa-paper-plane"></i></a></td> -->

                                <td><a href="deleteUser.inc.php?id=<?= $row['id']; ?>" class="btn-del btn alert-danger shadow"><i class="fa fa-trash"></i></a></td>
                                <td><a href="delete_users.php?id=<?= $row['id']; ?>" class="btn-del btn alert-warning shadow"><i class="fa fa-edit"></i></a></td>


                                <!-- <td><img style="width:120px; height:120px;" src="../inc/profileUploads/" alt=""></td> -->
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php
require_once __DIR__ . "/adminFooter.php";
?>