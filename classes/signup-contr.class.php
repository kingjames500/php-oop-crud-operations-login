<?php 

class SignupContr extends Signup{
    private $email;
    private $username;
    private $password;
    private $passwordRepeat;

    public function __construct($email, $username, $password, $passwordRepeat){
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }
    private function emptyInput(){
        $result;
        if (empty($this->email) || empty($this->username) || empty($this->password) || empty($this->passwordRepeat)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    private function userTakenCheck(){
        $result;
        if (!$this->ifUserExist($this->username, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
   private function passwordMatch(){
        $result;
        if ($this->password !== $this->passwordRepeat) {
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
    public function createUser(){
       if ($this->userTakenCheck() == false) {
            header("location: ../signup.php?error=userTaken"); 
            exit();
        }
        if ($this->passwordMatch() == false) {
            header("location: ../signup.php?error=passwordMatch");
            exit(); 
        }
        
        
        else {
            if ($this->emptyInput() == false) {
                header("location: ../signup.php?error=emptyInput"); 
                exit();
            }
            /*
            if ($this->validateEmail() == false) {
                header("location: ../signup.php?error=invalidEmail");
                exit();
            }*/
        }

        $this->registerUser($this->email, $this->username, $this->password);
    }

}