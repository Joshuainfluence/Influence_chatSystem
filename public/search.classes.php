<?php 
require_once __DIR__. "/../config/session.php";
require_once __DIR__. "/../config/dbh.php";
$user_id = $_SESSION['user_id'];
class Search extends Dbh{
    protected function searchUser($x, $y){
        // $sql = "SELECT * FROM users WHERE NOT unique_id = ? AND (fname LIKE %?% OR lname LIKE %?%)";
        $sql = "SELECT * FROM users WHERE NOT unique_id = ? AND (fname LIKE CONCAT('%', ?, '%') OR lname LIKE CONCAT('%', ?, '%'))";

        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$x, $y, $y])) {
            $stmt = null;
            exit();
        }

        if ($stmt->rowCount() == 0) {
           return [];
        }

        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $data;
    }
}