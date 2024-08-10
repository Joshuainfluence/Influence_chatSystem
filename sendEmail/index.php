<?php 
    require_once(__DIR__. "/../signup/signup_action.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send email</title>
</head>
<body>
    <form action="send.php" method="POST">
        Email <input type="hidden" name="email" id="" value="<?= $email?>">
        <br>
        Subject <input type="hidden" name="subject" id="" value="Verification code">
        <br>
        Message <input type="hidden" name="message" id="" value="<?= confirmation_code()?>">
        <br>
        <button type="submit" name="send">Send</button>
    </form>
</body>
</html>