<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $unique_id = $_POST['unique_id'];

    // Collect the digits from the form
    $digit1 = $_POST['digit1'];
    $digit2 = $_POST['digit2'];
    $digit3 = $_POST['digit3'];
    $digit4 = $_POST['digit4'];
    $digit5 = $_POST['digit5'];
    $digit6 = $_POST['digit6'];



    // Concatenate the digits to form the complete code
    $entered_code = $digit1 . $digit2 . $digit3 . $digit4 . $digit5 . $digit6;


    require_once __DIR__ . "/../config/dbh.php";
    require_once __DIR__ . "/../public/verifyCode.classes.php";
    require_once __DIR__ . "/../public/verifyCode.contr.php";
    require_once __DIR__ . "/../public/userProfile.classes.php";
    require_once __DIR__ . "/../public/userProfile.contr.php";

    $rows = new UserProfileContr($unique_id);
    $rows = $rows->userShow();
    $email = $rows[0]['email'];
    $update = new VerifyCodeContr($email, $entered_code);
    $update->codeVerify();


    header("Location: ../home.php?unique_id=$unique_id&account=$account");
}
