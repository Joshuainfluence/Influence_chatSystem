<?php

class UserProfileContr extends UserProfile
{
    private $x;
 

    public function __construct($x)
    {
        $this->x = $x;
      
    }



    // this function is working so well 
    public function userShow(){
        if ($this->x == null) {          
            exit();
        }
       
        $data = $this->showUser($this->x);
        return $data;
       
    }
}