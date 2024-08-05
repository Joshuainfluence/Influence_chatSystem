<?php
require_once __DIR__ . "/config/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.css">
    <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/sweetalert/jquery-3.6.4.min.js"></script>
</head>

<body>
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
    if (isset($_SESSION['success'])) :
        echo '<script>console.log("Success message: ' . $_SESSION['success'] . '");</script>';
    endif;

    if (isset($_SESSION['error'])) :
        echo '<script>console.log("Error message: ' . $_SESSION['error'] . '");</script>';
    endif;
    ?>
    <div class="login-container">

        <div class="login-row">

            <div class="login-col">
                <img src="assets/img/logo.png" alt="">
                <h2>INFLUENCE CHAT APP</h2>
                <!-- <span style="border: 1px solid #333; width: 100%; height: 1px; margin-bottom: 0.5rem;"></span> -->
                <form action="include/signup.include.php" method="POST" enctype="multipart/form-data">
                    <div class="name">
                        <div class="form-content">
                            <input type="text" class="form" name="fname" placeholder="Enter Firstname">
                        </div>
                        <div class="form-content">
                            <input type="text" class="form" name="lname" placeholder="Enter Lastname">
                        </div>
                    </div>
                    <div class="form-content">
                        <input type="text" class="form" name="email" placeholder="Enter E-mail here">
                    </div>
                    <div class="form-content">
                        <input type="password" name="password" class="form" placeholder="Enter Password">
                        <i class="fa fa-eye"></i>
                    </div>
                    <!-- <div class="form-content">
                        <input type="password" name="confirm_password" class="form" placeholder="Confirm Password">
                        <i class="fa fa-eye"></i>
                    </div> -->
                    <div class="form-content">
                        <label for="" style="color: #333;">Profile Image</label>
                        <br>

                        <input type="file" name="profileImage" id="">
                    </div>
                    <div class="form-content">
                        <input type="submit" class="form button" value="Register">
                    </div>
                    <div class="form-content">
                        <p>
                            Already have an account? <a href="login.html">Login</a>
                        </p>
                    </div>
                    <!-- <button type="button" class="but">but</button> -->

                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/password-show.js"></script>
    <!-- <script src="assets/js/signup.js"></script> -->

    

</body>

</html>
<?php unset($_SESSION['success']);
unset($_SESSION['error']) ?>