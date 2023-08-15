<?php

class Crud extends dbhClass{
    protected function insert($name, $age, $email ){
        $query = $this->databaseConn()->prepare("INSERT INTO crud (name, age, email) VALUES (?, ?, ?);");

        if (!$query->execute(array($name, $age, $email))) {
            $query = null;
            header("location: ../crud.php?error=stmtFailed");
            exit();                         
        }
        
    }
    protected function checkItemExists($email){
        $query = $this->databaseConn()->prepare("SELECT * FROM crud WHERE email = ?;");
        if (!$query->execute(array($email))) {
            $query = null;
            header("location: ../crud.php?error=stmtFailed");
            exit();                         
        }
        $result = $query->fetchAll();
        if (count($result) > 0) {
            $query = null;
            header("location: ../crud.php?error=itemExists");
            exit();                         
        }
    }

    protected function getAllItem($id){
        $stmt = $this->databaseConn()->prepare("SELECT * FROM crud WHERE id = ?;");
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../crud.php?error=stmtFailed");
            exit();                         
        }
        $result = $stmt->fetchAll();
        if (count($result) == 0) {
            $stmt = null;
            header("location: ../crud.php?error=itemNotFound");
            exit();                         
        }
        $id = $result[0]["id"];
        return $result;

    }

    protected function deleteSingleItem($id){
        $stmt = $this->databaseConn()->prepare("DELETE FROM crud WHERE id = ?;");
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../crud.php?error=stmtFailed");
            exit();                         
        }
        
    }
}