<?php

class crudContr extends Crud{
    private $name;
    private $email;
    private $phoneNumber;

    public function __construct($name, $email, $phoneNumber){
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }
    
    private function itemTakenCheck(){
        $results;
        if (!$this->checkItemExists($this->name, $this->phoneNumber)) {
            $results = false;
        } else {
            $results = true;
        }
        return $results;
    }
    private function emptyInputs(){
        $results;
        if (empty($this->name) || empty($this->email) || empty($this->phoneNumber)) {
            $results = false;
        } else {
            $results = true;
        }
        return $results;
    }
    public function createRecord(){
        if ($this->emptyInputs() == false) {
            header("location: ../crud.php?error=emptyInputs");
            exit();                         
        }
        if ($this->itemTakenCheck() == false) {
            header("location: ../crud.php?error=itemExists");
            exit();                         
        }
        $this->insert($this->name, $this->email, $this->phoneNumber);
    }       
}