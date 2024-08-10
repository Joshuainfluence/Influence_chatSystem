<?php

use phpMailer\PHPMailer\PHPMailer;
use phpMailer\PHPMailer\Exception;

require_once(__DIR__ . "/phpMailer/src/Exception.php");
require_once(__DIR__ . "/phpMailer/src/PHPMailer.php");
require_once(__DIR__ . "/phpMailer/src/SMTP.php");
require_once(__DIR__ . "/../public/userProfile.classes.php");
require_once(__DIR__ . "/../public/userProfile.contr.php");
require_once(__DIR__ . "/../config/session.php");
require_once(__DIR__ . "/../config/dbh.php");

$unique_id = $_GET['unique_id'];

if (isset($unique_id)) {
    // $username = $_SESSION['username'];
    $results = new UserProfileContr($unique_id);
    $rows = $results->userShow($unique_id);
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    // sender's email and app password
    $mail->Username = 'influencetechie@gmail.com';
    $mail->Password = 'ywlrpryyarnyczhe';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('influencetechie@gmail.com');

    // user's email address, fetched from the database
    foreach ($rows as $row) {
        $mail->addAddress($row['email']);

        $mail->isHTML(true);

        // verification message to be sent to user
        $mail->Subject = "Verification Code";


        // form redirects the user to an authentication page when they click the verification button
        // getting the user id from the database
        $mail->Body = ' <div class="container" style="width:100%; height:300px; background:#ffffff;">
        <div class="row" style="width:70%; height:inherit;">
            <div class="col" style="text-align: center;">
                <h3 style="text-align: center;">Dear ' . ucfirst($row['fname']) . " " . ucfirst($row['lname']) . ' your verification code is: </h3>
                <h1 id="myInput" style="text-align: center;">'.$row['verification_code'].'</h1>
<button onclick="myFunction()" style="width:100px; height:40px; background:#333; color:#ccc; font-size: 0.8rem;">Copy Code</button>

<script>
    function myFunction() {
       
        var copyText = document.getElementById("myInput").innerText;

        
        var tempInput = document.createElement("input");
         tempInput.type = "text";
        tempInput.value = copyText;
        document.body.appendChild(tempInput);

       
        tempInput.select();
        tempInput.setSelectionRange(0, 99999);

        document.execCommand("copy");

        
        document.body.removeChild(tempInput);

       
        alert("Copied the text: " + copyText);
    }
</script>

            </div>
        </div>
    </div>';
    }

    $mail->send();

    // echo 
    // "
    //     <script>
    //         alert('Sent successfully');
    //         document.location.href = 'index.php';
    //     </script>
    // ";
    header("Location: verifyCode.php?unique_id=$unique_id");
}
