<?php

class Crud extends dbhClass{
    protected function insert($name, $email, $phoneNumber){
        $query = $this->databaseConn()->prepare("INSERT INTO crud (name, email, phoneNumber, ) VALUES (?, ?, ?);");

        if (!$query->execute(array($name, $email, $phoneNumber))) {
            $query = null;
            header("location: ../crud.php?error=stmtFailed");
            exit();                         
        }
        
    }
    protected function checkItemExists($name,  $phoneNumber){
        $query = $this->databaseConn()->prepare("SELECT * FROM crud WHERE name = ?  AND phoneNumber = ?;");
        if (!$query->execute(array($name,  $phoneNumber))) {
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
}