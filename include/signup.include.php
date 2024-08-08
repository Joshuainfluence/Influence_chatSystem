<?php 

// checking is the form was submitted successfully
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // fetching out the details from the form
    
    $unique_id = rand(time(), 1000000); 
    $fname = htmlspecialchars($_POST['fname'], ENT_QUOTES, 'UTF-8');
    $lname = htmlspecialchars($_POST['lname'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
   
    // remaining the profile image
    $profileImage = isset($_POST['profileImage']) ? $_FILES['profileImage'] : null;
    

    // including all necessary files
    require_once __DIR__. "/../config/dbh.php";
    require_once __DIR__. "/../config/session.php";
    require_once __DIR__. "/../public/signup.classes.php";
    require_once __DIR__. "/../public/signup.contr.php";

    // With the help of require_once we are able to get the signup controller class 
    // which is responsible for all form validation 
    $signup = new SignupContr($unique_id, $fname, $lname, $email, $password, $_FILES);

    // signUser is a method created in the controller class for final execution 
    // header("Location: ../sendEmail/send.php?error=none");
    // header("Location: ../sendEmail/send.php?error=none");
    // header("Location: ../sendEmail/send.php?error=none");
    header("Location: ../home.php");
    $_SESSION['user_id'] = $unique_id;
    $_SESSION['email'] = $email;
    $signup->signUser();

    
    
}