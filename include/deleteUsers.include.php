<?php 
  
    $unique_id = $_GET['unique_id'];
  
    require_once __DIR__. "/../config/session.php";
    require_once __DIR__. "/../config/dbh.php";
    require_once __DIR__. "/../public/deleteUsers.classes.php";
    require_once __DIR__. "/../public/deleteUsers.contr.php";

    $update = new DeleteUsersContr($unique_id);
    $update->userDelete();
    $update->set_message("success", "User deleted successfully");
    header("Location: ../admin/viewUsers.php?delete successful");
    
    
