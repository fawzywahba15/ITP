<?php

if (!isset($_SESSION)){
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $bday = $_POST["birthdate"];
    $password = $_POST["password"];
    $password_2 = $_POST["password_2"];
    if (!isset($_COOKIE["name_cookie"])){
        $_COOKIE["name_cookie"] ="$lname";

    }else{
        setcookie("name_cookie", $lname, time() + 600);
    }



}


?>





<h3>
    <?php
    if (isset($_COOKIE["name_cookie"])){
        echo "Hallo " . $_COOKIE["name_cookie"] . ", ";
        echo "<h4>Sie haben sich erfolgreich registriert und können sich nun 
            <a href='../login/login.php'>anmelden</a>!</h4>";
    }else{
        echo "Leider ist etwas schiefgelaufen. <a href='./registrierformular.php'>Erneut registrieren</a> ";
    }
    include "./exercise_2.php";


    ?>
</h3>



