<?php

class AdminUserContr extends AdminUser
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;

    }



    // this function is working so well 
    public function userAdmin(){
        if ($this->x == null || $this->y == null) {          
            exit();
        }
       
       
        $data = $this->adminUser($this->x, $this->y);
        return $data;
       
    }

     // for displaying the total user on the overview page
     public function UserTotal(){
        if ($this->x == 0) {
            exit();
        }

        $data = $this->totalUsers($this->x, $this->y);
        return $data;
    }
}