<?php
require_once __DIR__. "/../config/session.php";
class DeleteUsersContr extends DeleteUsers
{
    private $x;
   

    public function __construct($x)
    {
        $this->x = $x;
      

    }



    // this function is working so well 
    public function userDelete(){
        if ($this->x == null) {          
            exit();
        }
       
       
        $data = $this->deleteUser($this->x);
        return $data;
       
    }

    public function set_message($type, $message){
        $_SESSION[$type] = $message;
    }

   
}