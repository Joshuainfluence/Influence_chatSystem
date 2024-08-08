<?php 

// require_once __DIR__. "/signup.classes.php";
class UsersContr extends Users{
    private $x;
    private $y;
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;

    }

    public function usersDisplay(){
        if ($this->x == null) {          
            exit();
        }
       
        $data = $this->displayUsers($this->x);
        return $data;
       
    }
}