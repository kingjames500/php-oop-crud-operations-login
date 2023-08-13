<?php
session_start();

if (isset($_SESSION["name"]) AND isset($_SESSION["address"])) {
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phoneNumber"];

        include "../classes/dbh-class.php";
        include "../classes/crud classes/crud.class.php";
        include "../classes/crud classes/crud-contr.class.php";

        $insert = new crudContr($name, $email, $phoneNumber);
        $insert->createRecord();
       
    }
}