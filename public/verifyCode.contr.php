<?php

class VerifyCodeContr extends VerifyCode
{
    private $x;
    private $y;
 

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;

      
    }

    private function set_message($type, $message)
    {
        $_SESSION[$type] = $message;
    }



    // this function is working so well 
    public function codeVerify(){
        if (empty($this->x)) {          
           $this->set_message("error", "Fields cannot be empty");
           exit();
        }
       
        $data = $this->verifyCode($this->x, $this->y);
        return $data;
       
    }
}