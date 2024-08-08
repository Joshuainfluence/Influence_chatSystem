<?php 

require_once __DIR__. "/../config/dbh.php";

class DeleteUsers extends Dbh{
    protected function deleteUser($x){
        $sql = "DELETE FROM users WHERE unique_id = ?";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$x])) {
            $stmt = null;
            // header("Location: index.php?errorviewingusers");
            exit();
        }
        
       $stmt = null;
        
    }
}