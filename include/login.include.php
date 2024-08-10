<?php 
require_once __DIR__. "/../config/session.php";
$user_id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    require_once __DIR__. "/../config/dbh.php";
    require_once __DIR__ . "/../config/session.php";
    require_once __DIR__. "/../public/login.classes.php";
    require_once __DIR__. "/../public/login.contr.php";

    $login = new LoginContr($email, $password);
    
    $login->LogUser();
    $_SESSION['login'] = "login";

    header("Location: ../home.php?user_id=$user_id");
    

    

}