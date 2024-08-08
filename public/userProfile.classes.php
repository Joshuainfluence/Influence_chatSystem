<?php 
require_once __DIR__. "/../config/dbh.php";
class UserProfile extends Dbh{
    protected function showUser($x){
        $sql = "SELECT * FROM users WHERE unique_id = ? ";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$x])) {
            $stmt = null;
            // header("Location: index.php?errorviewingusers");
            exit();
        }
        
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // the print_r($details) is actual working and it is getting the users from the database. So we are actually clear here
        // print_r($details);
        return $details;
        
    }
}