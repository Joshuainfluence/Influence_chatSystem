<?php
require_once __DIR__ . "/config/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
                <hr>
                <form action="include/login.include.php" method="POST">
                    <div class="form-content">
                        <input type="text" class="form" name="email" placeholder="Enter E-mail here">
                    </div>
                    <div class="form-content">
                        <input type="password" name="password" class="form" placeholder="Enter Password here">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="form-content">
                        <input type="submit" class="form button" value="Login">
                    </div>
                    <div class="form-content">
                        <p>
                            Don't have an account? <a href="index.php">Signup</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/password-show.js"></script>
</body>

</html>
<?php unset($_SESSION['success']);
unset($_SESSION['error']) ?>