<?php

use phpMailer\PHPMailer\PHPMailer;
use phpMailer\PHPMailer\Exception;

require_once(__DIR__ . "/phpMailer/src/Exception.php");
require_once(__DIR__ . "/phpMailer/src/PHPMailer.php");
require_once(__DIR__ . "/phpMailer/src/SMTP.php");
require_once(__DIR__ . "/../admin/admin.classes.php");
require_once(__DIR__ . "/../admin/verifyUserContr.php");
require_once(__DIR__ . "/../config/session.php");
require_once(__DIR__ . "/../config/dbh.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['user_email'];
    $value = new VerifyUser($email);
    $rows = $value->confirmPasswordEmail($email);
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    // sender's email and app password
    $mail->Username = 'veeclaconcept@gmail.com';
    $mail->Password = 'gokcnfwzsqdoipre';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('veeclaconcept@gmail.com');

    // user's email address, fetched from the database
    foreach ($rows as $row) {
        $mail->addAddress($email);

        $mail->isHTML(true);

        // verification message to be sent to user
        $mail->Subject = "Verification Code";
        

        // form redirects the user to an authentication page when they click the verification button
        // getting the user id from the database
        $mail->Body = "<div> 
    <div><h2 style='font-size:20px; font-family:sans-serif; font-weight:600;'>Hello " . ucfirst($row['fullName']) . "</h2></div>
    <div style='font-size:15px; font-family:sans-serif;'>Click on the button to update your Password.<b>
    <br>
   <form action='http://localhost/veecla/sendEmail/changePassword.php?id=" . $row['id'] . "' method='POST'>
    <input type='submit' name='auth' style='width:100px; height:40px; color:#fff; font-size:15px; border:1px solid red; background-color: red; margin-top: 2rem; border-radius:5px;' value='Verify'>
   </form>
    </div>
   
    </div>
    ";
    }

    $mail->send();

    // echo 
    // "
    //     <script>
    //         alert('Sent successfully');
    //         document.location.href = 'index.php';
    //     </script>
    // ";
    header("Location: verificationLink.php");
}
