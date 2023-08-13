<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];   
    $password = $_POST["password"];

    //instance of classes
    include "../classes/dbh-class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";

    $login = new loginContr($email, $password);
    $login->loginUser();
}