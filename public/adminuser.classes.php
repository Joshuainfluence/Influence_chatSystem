<?php 

require_once __DIR__. "/../config/dbh.php";

class AdminUser extends Dbh{
    protected function adminUser($x, $y){
        $sql = "SELECT * FROM users WHERE account = ? OR account = ?";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$x, $y])) {
            $stmt = null;
            // header("Location: index.php?errorviewingusers");
            exit();
        }
        
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // the print_r($details) is actual working and it is getting the users from the database. So we are actually clear here
        // print_r($details);
        return $details;
        
    }

    
    protected function totalUsers($x, $y){
        $sql = "SELECT id FROM users WHERE account = ? OR account = ?";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$x, $y])) {
            $stmt = null;
            exit();
        }

        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }
}