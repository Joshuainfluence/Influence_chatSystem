<?php 

class SearchContr extends Search{
    private $x;
    private $y;
    // private $z;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        // $this->z = $z;
    }

    public function userSearch(){
        if (empty($this->y)) {
            return [];
        }

        return $this->searchUser($this->x, $this->y);
    }
}