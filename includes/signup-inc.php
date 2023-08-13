<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

     //class instances
    include "../classes/dbh-class.php";
    include "../classes/signup-class.php";
    include "../classes/signup-contr.class.php";

    $signup = new SignupContr($email, $username, $password, $passwordRepeat);
    $signup->createUser();

    if ($signup->createUser() == true) {
        header("location: ../login.php?error=none");
        # code...
    }
}