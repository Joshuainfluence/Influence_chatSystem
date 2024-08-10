<?php
require_once __DIR__ . "/../config/dbh.php";
class VerifyCode extends Dbh
{
    private function set_message($type, $message)
    {
        $_SESSION[$type] = $message;
    }
    // protected function verifyCode($x)
    // {
    //     $sql = "SELECT * FROM users WHERE verification_code = ? ";
    //     $stmt = $this->connection()->prepare($sql);
    //     if (!$stmt->execute([$x])) {
    //         $stmt = null;
    //         // header("Location: index.php?errorviewingusers");
    //         exit();
    //     }

    //     if ($stmt->rowCount() == 0) {
    //         $this->set_message("error", "Invalid verification code");
    //     } else {
    //         echo "Good";
    //     }
    // }

    protected function verifyCode($email, $enteredCode)
    {
        $sql = "SELECT verification_code, verification_code_expiration FROM users WHERE email = :email";
        $statement = $this->connection()->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            // Check if the code is expired
            if (new DateTime($result['verification_code_expiration']) >= new DateTime()) {
                // Check if the entered code matches the stored code
                if ($enteredCode == $result['verification_code']) {
                    // Code is correct
                    $this->set_message("success", "Verification successful.");
                    // Mark user as verified (optional)
                    // $this->markUserAsVerified($email);
                } else {
                    // Incorrect code
                    $this->set_message("error", "Incorrect verification code.");
                    exit();
                }
            } else {
                // Code is expired
                $this->set_message("error", "Verification code has expired. Please request a new one.");
                exit();

            }
        } else {
            $this->set_message("error", "User not found.");
            exit();

        }
    }
}
