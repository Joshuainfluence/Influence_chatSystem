<?php
require_once __DIR__ . "/config/session.php";
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header("Location: login.php");
}

require_once __DIR__ . "/config/dbh.php";
require_once __DIR__ . "/public/userProfile.classes.php";
require_once __DIR__ . "/public/userProfile.contr.php";

$rows = new UserProfileContr($user_id);
$rows = $rows->userShow();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>iChat</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.css">
    <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/sweetalert/jquery-3.6.4.min.js"></script>
</head>

<body>
    <style>
        .script {
            z-index: 999999;
        }
    </style>
    <div class="script">
        <script>
            window.onload = function() {
                <?php if (isset($_SESSION['user_id']) && isset($_SESSION['signup'])) : ?>
                    Swal.fire("Success", "Registration Successful", "success");
                <?php endif ?>
                <?php if (isset($_SESSION['user_id']) && isset($_SESSION['login'])) : ?>
                    Swal.fire("Success", "Login Successful", "success");
                <?php endif ?>
            };
        </script>
    </div>
    <header>
        <nav>
            <img src="assets/img/logo.png" alt="">
            <h2>INFLUENCE</h2>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col">
                <i class="fa fa-reorder">
                    <!-- <div class="something">
                        <h3>Hello world</h3>
                        <p>My name is INFLUENCE</p>
                    </div> -->
                </i>

                <i class="fa fa-commenting"></i>
                <i class="fa fa-phone"></i>
                <i class="fa fa-ge"></i>
                <!-- <i class="fa fa-sun-o" id="sun"></i> -->
                <button id="icon"><i class="fa fa-sun-o" id="moon"></i></button>



            </div>

            <div class="col">
                <i class="fa fa-user">
                    <div class="user">
                        <div class="image"><img src="include/profileUploads/<?= $rows[0]['profileImage'] ?>" alt=""></div>
                        <div class="name"><?= ucfirst($rows[0]['fname']) . " " . ucfirst($rows[0]['lname']) ?><?php if ($rows[0]['account'] == "verified") : ?> <img src="assets/img/verify3.png" alt=""><?php endif ?></div>
                        <div class="account"><?= ucfirst($rows[0]['account']) ?> User</div>
                        <div class="setting"><a href=""><i class="fa fa-cog"></i>Settings</a></div>


                    </div>
                </i>
                <i class="fa fa-sign-out">
                    <div class="logout"><a href="config/logout.php">Logout</a></div>
                </i>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        Chats
                    </div>
                    <div class="col">
                        <i class="fa fa-pencil-square-o"></i>
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-feed"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="search">
                            <i class="fa fa-search"></i>
                            <input type="text" name="" id="searchBar" placeholder="Search or start a new chat">
                        </div>
                    </div>
                </div>
                <div class="chats">

                    <!-- loop and display users from the database -->
                    <div class="row1">
                        <div class="col1">
                            <img src="assets/img/billie.png" alt="">
                        </div>
                        <div class="col2">
                            <div class="row2">
                                <h3>Billie Eilish <img src="assets/img/verify3.png" alt=""></h3>
                                <p>Yesterday</p>
                            </div>
                            <div class="row3">
                                <p style="font-size: 0.8rem;">WhatsApp is leaving Nigeria</p>
                            </div>
                        </div>
                    </div>
                    <!-- loop and display users from the database -->
                    <?php
                    require_once __DIR__ . "/config/dbh.php";
                    require_once __DIR__ . "/public/users.classes.php";
                    require_once __DIR__ . "/public/users.contr.php";

                    $x = $user_id;
                    $y = "verified";
                    $value = new UsersContr($x, $y);
                    $rows = $value->usersDisplay();

                    foreach ($rows as $row) :

                    ?>

                        <div class="row1">
                            <div class="col1">
                                <img src="include/profileUploads/<?= $row['profileImage'] ?>" alt="">
                            </div>
                            <div class="col2">
                                <div class="row2">
                                    <h3><?= ucfirst($row['fname']) . " " . ucfirst($row['lname']) ?><?php if ($row['account'] == "verified") : ?> <img src="assets/img/verify3.png" alt=""><?php endif ?> </h3>
                                    <p>Yesterday</p>
                                </div>
                                <div class="row3">
                                    <p>Yes</p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                </div>


            </div>
       