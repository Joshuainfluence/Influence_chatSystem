<?php 

// require_once __DIR__. "/signup.classes.php";
class UserEditContr extends UserEdit{
    private $x;
    private $y;
    private $z;
    public function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        // $this->y = $y;

    }

    public function editUser(){
        if ($this->x == null) {          
            exit();
        }
       
        $data = $this->userEdit($this->x);
        return $data;
       
    }

    public function editUserUpdate(){
        if ($this->x == null || $this->y == null || $this->z == null) {          
            exit();
        }
       
        $this->userEditUpdate($this->x, $this->y, $this->z);
        // return $data;
       
    }
}