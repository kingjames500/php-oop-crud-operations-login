<?php

class dbhClass 
{
    protected function databaseConn(){
        //error handling method
        try {
            $username = "root";
            $password = "1234";
            $db = new PDO('mysql:host=localhost;dbname=weather', $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
            return $db;                     
        } catch (PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
            exit();             
            
        }
    }
}
