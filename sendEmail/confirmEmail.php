<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/sweetalert/jquery-3.6.4.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/logo5.png" />
</head>

<body>
    <style>
        body {
            background-color: #fff;
        }

        .container {
            width: 100%;
            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

        }

        .background-div {
            width: 500px;
            height: 300px;
            border: 1px solid green;
            background: #fff;
            box-shadow: 5px 5px 5px 5px grey;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .title {
            width: 96%;
            margin-left: 2%;
            text-align: center;
            font-size: 20px;
        }

        .button {
            width: 100px;
            height: 50px;
            background-color: #000;
            color: #fff;
            border-radius: 5px;
            margin-top: 1rem;
        }

        .button:hover {
            background-color: #fff;
            color: #000;
            cursor: pointer;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-top: 1rem;
        }

        .form-control {
            outline: none;
            border: 1px solid #7E7E7E;
            width: 100%;
            height: 40px;
            font-size: 1.2rem;
            padding: .375rem .75rem;
            background: transparent;
        }

        .form-control:focus {
            border: 1px solid #FE48AA;
        }

        .form-control::placeholder {
            opacity: 1;
            line-height: 1.2rem;
        }

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
    <div class="container">
        <div class="background-div">
            <div class="title">
                Enter Email your email address. A verification link will be sent to your Email to make necessary changes.
            </div>
            <form action="sendEmailPassword.php" method="POST">
                <input type="text" name="user_email" id="user_email" placeholder="Enter E-mail" class="form-control">
                <input type="submit" value="Proceed" class="button">
            </form>
        </div>
    </div>
</body>

</html>