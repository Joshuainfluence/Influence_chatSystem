<?php 
require_once __DIR__. "/../config/session.php";

class LoginContr extends Login{
    private $email;
    private $password;
    // public $error;
    // private $message;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    protected function emptyInput(){
        if (empty($this->email) || empty($this->password)) {
            return true;
        }else{
            return false;
        }
    }
    protected function AdminLogin(){
        if ($this->email == "Admin" && $this->password == "12345") {
            return true;
        } else {
            return false;
        }
        
    }

    private function set_message($type, $message){
        $_SESSION[$type] = $message;
    }
    public function LogUser(){
        if ($this->emptyInput() == true) {
            $this->set_message("error", "Fields cannot be empty");
            header("Location: ../login.php?error=emptyinput");
            exit();
        }
        if ($this->AdminLogin() == true) {
            header("Location: ../admin/index.php?Admin registration successful");
            exit();
        }
       
       
        $this->loginUser($this->email, $this->password);
    }
} 