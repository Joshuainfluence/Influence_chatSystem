<?php
require_once __DIR__ . "/adminHeader.php";
require_once __DIR__ . "/../public/adminprofile.classes.php";
require_once __DIR__ . "/../public/adminprofile.contr.php";
$id = $_GET['id'];
$rows = new AdminProfileStaffContr($id);
$rows = $rows->editAdminStaffDisplay();

?>
<style>
    .script {
        z-index: 9999;
    }
</style>
<div class="script">
    <script>
        window.onload = function() {
            <?php if (isset($_SESSION['success'])) : ?>
                Swal.fire("Success", "<?= $_SESSION['success'] ?>", "success");
            <?php endif ?>

            <?php if (isset($_SESSION['error'])) : ?>
                Swal.fire("Error", "<?= $_SESSION['error'] ?>", "error");
            <?php endif ?>
        };
    </script>
</div>
<div class="container">
    <h1 class="h3 mb-2 text-gray-800">Account Settings | Edit Profile</h1>
    <p class="mb-4">All products of different categoreis <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    <!-- Content Row -->
    <div class="row">

        <div class="col-12">
            <!-- <div class="card"> -->
            <form action="../inc/adminUpdate.inc.php" method="POST" enctype="multipart/form-data">
                <?php
                foreach ($rows as $row) :
                    $_SESSION['id'] = $row['id'];
                ?>
                    <div class="form-group mt-2">
                        <label for="fullname">
                            <h5>Fullname</h5>
                        </label>
                        <input type="text" name="fullname" id="fullname" class="form-control" value="<?= $row['fullname']?>">
                    </div>

                    <div class="form-group mt-2">
                        <label for="email">
                            <h5>Email</h5>
                        </label>
                        <input type="text" name="email" id="email" class="form-control " value="<?= $row['email']?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="username">
                            <h5>Username</h5>
                        </label>
                        <input type="text" name="username" id="username" class="form-control " value="<?= $row['username']?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">
                            <h5>password</h5>
                        </label>
                        <input type="password" name="password" id="password" class="form-control " value="<?= $row['password']?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="office">
                            <h5>Office</h5>
                        </label>
                        <input type="text" name="office" id="office" class="form-control " value="<?= $row['office']?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="mobile">
                            <h5>Mobile</h5>
                        </label>
                        <input type="text" name="mobile" id="mobile" class="form-control " value="<?= $row['mobile']?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="address">
                            <h5>Address</h5>
                        </label>
                        <input type="text" name="address" id="address" class="form-control " value="<?= $row['address']?>">
                    </div>

                    <div class="form-group mt-2">
                        <label for="image">
                            <h5>Profile Image</h5>
                        </label>
                        <input type="file" name="image" id="image" class="form-group">
                    </div>

                    <div class="form-group mt-2">
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                    </div>
                <?php
                endforeach
                ?>

            </form>
            <!-- </div> -->
        </div>




    </div>

</div>
<style>
    .script {
        z-index: 9999;
    }
</style>
<div class="script">
    <script>
        window.onload = function() {
            <?php if (isset($_SESSION['success'])) : ?>
                Swal.fire("Success", "<?= $_SESSION['success'] ?>", "success");
            <?php endif ?>

            <?php if (isset($_SESSION['error'])) : ?>
                Swal.fire("Error", "<?= $_SESSION['error'] ?>", "error");
            <?php endif ?>
        };
    </script>
</div>
<?php
// if (isset($_SESSION['success'])) :
//     echo '<script>console.log("Success message: ' . $_SESSION['success'] . '");</script>';
// endif;

// if (isset($_SESSION['error'])) :
//     echo '<script>console.log("Error message: ' . $_SESSION['error'] . '");</script>';
// endif;
?>

<!-- End of Topbar -->

<!-- Begin Page Content -->









</div>
<!-- End of Main Content -->
<?php
require_once __DIR__ . "/adminFooter.php";
?>