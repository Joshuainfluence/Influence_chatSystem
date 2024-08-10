<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_GET['id'];
    $password = htmlspecialchars($_POST['new_password'], ENT_QUOTES, 'UTF-8');

    require_once __DIR__ . "/../config/dbh.php";
    require_once __DIR__ . "/../admin/admin.classes.php";
    require_once __DIR__ . "/../admin/updatePasswordContr.php";
    require_once __DIR__. "/../config/session.php";

    $update = new UpdateUserPasswordContr($password, $id);

    $update->passwordUpdate($password, $id);

    header("Location: ../inc/login.php?passwordChanged");
}
