<?php
require_once __DIR__ . "/../config/dbh.php";
require_once __DIR__ . "/../config/session.php";
class Login extends Dbh
{
    private function set_message($type, $message)
    {
        $_SESSION[$type] = $message;
    }
    protected function loginUser($email, $password)
    {
        $sql = "SELECT password FROM users WHERE email = ?";
        $statement =  $this->connection()->prepare($sql);
        if (!$statement->execute([$email])) {
            $statement = null;
            header("Location: ../login.php");
            exit();
        }

        if ($statement->rowCount() == 0) {
            $statement = null;
            $this->set_message("error", "User not Found");
            header("Location: ../login.php");
            exit();
        }

        $passwordHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]['password']);

        if ($checkPassword == false) {
            $statement = null;
            $this->set_message("error", "Incorrect Password");
            header("Location: ../login.php?error=wrongpassword");
            exit();
        } elseif ($checkPassword == true) {
            $sql = "SELECT * FROM users WHERE email = ? OR fname = ? AND password = ?";
            $statement = $this->connection()->prepare($sql);
            if (!$statement->execute([$email, $email, $password])) {
                $statement = null;
                header("Location: ../login.php?oi");
                exit();
            }
            if ($statement->rowCount() == 0) {
                $statement = null;
                header("Location: ../login.php?io");
                exit();
            }

            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            // session_start();
            $_SESSION['user_id'] = $user[0]['unique_id'];
            $_SESSION['email'] = $user[0]['email'];
            var_dump($user);

            if ($user[0]['vcode'] == "enabled") {
                $unique_id = $_SESSION['user_id'];
                $_SESSION['login'] = "login";
                header("Location: ../sendEmail/send.php?unique_id=$unique_id");
                exit();
            } else {
                // this is to update the user's status in the database, when successfully logged in
                $updateSql = "UPDATE users SET last_activity = NOW() WHERE unique_id = ?";
                $updateStmt = $this->connection()->prepare($updateSql);
                $updateStmt->execute([$_SESSION['user_id']]);  // Replace $userId with the actual user's ID
            }
        }

        $statement = null;
    }
}
