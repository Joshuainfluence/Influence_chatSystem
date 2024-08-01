<?php

require_once __DIR__. "/../config/dbh.php";
class Users extends Dbh{
    protected function displayUsers($x, $y){
        $sql = "SELECT * FROM users WHERE account = ? OR account = ?";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$x, $y])) {
            $stmt = null;
            exit();
        }
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }
}