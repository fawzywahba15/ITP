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
    //cookie zur begrüßung
    if (!isset($_COOKIE["name_cookie"])){
        $_COOKIE["name_cookie"] ="$lname";

    }else{
        //erstellt einen cookie für die begrüßung
        setcookie("name_cookie", $lname, time() + 600);
    }



}


?>





<h3>
    <?php
    if (isset($_COOKIE["name_cookie"])){
        //bei erfolg:
        echo "Hallo " . $_COOKIE["name_cookie"] . ", ";
        echo "<h4>Sie haben sich erfolgreich registriert und können sich nun 
            <a href='../login/login.php'>anmelden</a>!</h4>";
        //speichert die daten in der db ein
        include "./reg_into_db.php";


        include_once "../0include/footer.php";


    }else{
        // wenn es schief läuft
        echo "Leider ist etwas schiefgelaufen. <a href='./new_reg.php'>Erneut registrieren</a> ";
    }



    ?>
</h3>




