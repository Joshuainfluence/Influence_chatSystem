<?php 


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
    
    $unique_id = $_POST['unique_id'];
    $account = $_POST['account'];
    $vcode = $_POST['vcode'];

    require_once __DIR__. "/../config/dbh.php";
    require_once __DIR__. "/../public/userEdit.classes.php";
    require_once __DIR__. "/../public/userEdit.contr.php";

    $update = new UserEditContr($account, $vcode, $unique_id);
    $update->editUserUpdate();
    header("Location: ../admin/userEdit.php?unique_id=$unique_id&account=$account");
    
    
}