<?php 
require_once __DIR__."/../config/dbh.php";

class Signup extends Dbh{

    // to insert users into the database or signup users
    protected function RegisterUser($unique_id, $fname, $lname, $email, $password, $profileImage){
        $sql = "INSERT INTO users(unique_id, fname, lname, email, password, profileImage) VALUES(:unique_id, :fname, :lname, :email, :password, :profileImage)";
        $statement = $this->connection()->prepare($sql);
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $statement->bindParam(':unique_id', $unique_id);
        $statement->bindParam(':fname', $fname);
        $statement->bindParam(':lname', $lname);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':profileImage', $profileImage);
        

        if (!$statement->execute()) {
            $statement = null;
            header("Location: ../inc/signup.php?error=stmtfailed");
            exit();
        }

       $statement = null;
    }

    // to check if user already exists

    protected function UserCheck($email){
        $sql = "SELECT email FROM users WHERE email = ?";
        $statement = $this->connection()->prepare($sql);
        $statement->execute([$email]);
        $result = 0;

        if ($statement->rowCount() > 0) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
       

    }

    // protected function emailSubscribe($name, $email){
    //     $sql = "INSERT INTO subscribe(name, email) VALUES(:name, :email)";
    //     $statement = $this->connection()->prepare($sql);       
    //     $statement->bindParam(':name', $name);       
    //     $statement->bindParam(':email', $email);
    //     if (!$statement->execute()) {
    //         $statement = null;
    //         header("Location: ../inc/signup.php?error=stmtfailed");
    //         exit();
    //     }

    //    $statement = null;
    // }
}
