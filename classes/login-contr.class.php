<?php

class loginContr extends Login{
    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }
    private function emptyInput(){
        $result;
        if (empty($this->email) || empty($this->password)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    private function validateEmail(){
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
    }
    public function loginUser(){
        if ($this->emptyInput() == false) {
            header("location: ../login.php?error=emptyInput"); 
            exit();
        }
        /*if ($this->validateEmail() == false) {
            header("location: ../login.php?error=invalidEmail"); 
            exit();
        }*/
        $this->userLogin($this->email, $this->password);
    }
}