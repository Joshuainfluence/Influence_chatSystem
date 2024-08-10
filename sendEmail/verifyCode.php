<?php
$unique_id = $_GET['unique_id'];
require_once __DIR__. "/../config/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code Input</title>
    <link rel="stylesheet" href="../assets/verifyCode.css">
    <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/sweetalert/jquery-3.6.4.min.js"></script>
</head>

<body>
<style>
        .script {
            z-index: 9999;
        }
    </style>
    <div class="script">
        <script>
            window.onload = function() {
              

                <?php if (isset($_SESSION['error'])) : ?>
                    Swal.fire("Error", "<?= $_SESSION['error'] ?>", "error");
                <?php endif ?>
            };
        </script>
    </div>
    <?php
    if (isset($_SESSION['success'])) :
        echo '<script>console.log("Success message: ' . $_SESSION['success'] . '");</script>';
    endif;

    if (isset($_SESSION['error'])) :
        echo '<script>console.log("Error message: ' . $_SESSION['error'] . '");</script>';
    endif;
    ?>
    <div class="verification-container">
        <div class="title">
            A verification code was sent to your Email.
        </div>
        <h2>Enter Verification Code</h2>
        <form id="verification-form" method="POST" action="../include/verifyCode.include.php">
            <div class="verification-form">
                <input type="text" maxlength="1" name="digit1" class="code-input" autofocus>
                <input type="text" maxlength="1" name="digit2" class="code-input">
                <input type="text" maxlength="1" name="digit3" class="code-input">
                <input type="text" maxlength="1" name="digit4" class="code-input">
                <input type="text" maxlength="1" name="digit5" class="code-input">
                <input type="text" maxlength="1" name="digit6" class="code-input">
                <input type="hidden" name="unique_id" value="<?php echo $unique_id?>">

            </div>
            <div class="buttons">
                <input type="submit" value="Verify Code">
                <a href="https://mail.google.com/mail/u/0/#inbox/" target="_blank" class="button">Check Gmail</a>
            </div>

        </form>

    </div>
    <script src="../assets/js/verifyCode.js"></script>
</body>

</html>
<?php unset($_SESSION['success']);
unset($_SESSION['error']) ?>

<!-- HTML:

A simple form contains six input fields, each restricted to a single character.
The maxlength="1" attribute ensures only one digit is allowed per field.
The first input field is auto-focused.

CSS:

Flexbox is used to center the form and space out the input fields.
The fields are styled for a clean, minimal look with responsiveness for smaller screens.
The :focus style changes the border color when the field is active.

JavaScript:

Automatically moves focus to the next input when a digit is entered.
Allows backspacing to move the focus back to the previous input.
This setup provides a clean, user-friendly interface for entering a six-digit verification code. -->