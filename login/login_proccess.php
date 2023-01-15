<?php

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = strtolower($_POST["email"]);
    $password = $_POST["password"];
    //db con
    include_once "../0include/dbaccess.php";
    $sql = "SELECT * FROM `login`";
    $result = $db_obj->query($sql);

    if ($result->num_rows > 0) {

        //iteriert alle datensätz in der Datenbank
        while($row = $result->fetch_assoc()) {

            // sucht email
            if ($email == $row["usermail"] ){
                // überprüft passwort
                if (password_verify($_POST["password"], $row["password"])){

                    if ($row["status"] == "aktiv"){
                        //session starten
                        session_start();
                        $_SESSION["email"] = $email;
                        $_SESSION["user_id"] = $row["id"];
                        $_SESSION["username"] = $row["username"];
                        $_SESSION["vorname"] = $row["first_name"];
                        //falls man ein admin ist dann in der SESSION speichern
                        if ($row["admin"] == 1){
                            $_SESSION["admin"] = true;
                        }
                        //wenn alles passt dann weiter zu process
                        include "../index/main.php";
                        exit();
                    }else{
                        $error = "Ihr Konto ist gesperrt bitte kontaktieren Sie uns!";
                        break;
                    }
                    //wenn das passwort falsch ist
                }else{
                    $error = "Password or Email dont match";
                }
                // wenn es den Benutzer nicht gibt
            } else{
                $error = "Password or Email dont match";
            }
        }
    }



    $db_obj->close();
}