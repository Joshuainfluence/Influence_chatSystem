<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>iChat</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.css">
</head>

<body>
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
                        <i class="fa fa-search"></i>
                        <input type="text" name="" id="" placeholder="Search or start a new chat">
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
                    require_once __DIR__. "/config/dbh.php";
                    require_once __DIR__ . "/public/users.classes.php";
                    require_once __DIR__ . "/public/users.contr.php";

                    $x = "registered";
                    $y = "verified";
                    $value = new UsersContr($x, $y);
                    $rows = $value->usersDisplay();

                    foreach ($rows as $row) :

                    ?>

                        <div class="row1">
                            <div class="col1">
                                <img src="include/profileUploads/<?= $row['profileImage']?>" alt="">
                            </div>
                            <div class="col2">
                                <div class="row2">
                                    <h3><?= ucfirst($row['fname']) ." ". ucfirst($row['lname'])?><?php if($row['account'] == "verified"): ?> <img src="assets/img/verify3.png" alt=""><?php endif?> </h3>
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