<?php

class Signup extends dbhClass{
    //inserting the user onto the database
    protected function registerUser($email, $username, $password){
        $stmt = $this->databaseConn()->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
        if (!$stmt->execute(array($email, $username, $hashedPassword))) {
            $stmt = null;
            echo "Error: " . $stmt->errorCode();
            header("location: ../signup.php?error=stmtFailed");
            exit();
            # code...
        } 
        $stmt = null;                                                     
    }

    protected function ifUserExist($username, $email){
            $stmt = $this->databaseConn()->prepare("SELECT users_id FROM users WHERE username = ? OR email = ?");

            if (!$stmt->execute(array($username, $email))) {
                $stmt = null;
                echo "Error: " . $stmt->errorCode();
                header("location: ../signup.php?error=stmtFailed");
                exit();
            } 
            $result;
            
            if ($stmt->rowCount() > 0) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;

        }

}