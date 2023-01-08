<?php
if(!isset($_SESSION)) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower($_POST["email"]);
    $password = $_POST["password"];

    //db conn
    $db_obj = new mysqli('localhost', 'fawzy', 'mypassword', 'regestrieren');
    $sql = "SELECT * FROM `login`";
    $result = $db_obj->query($sql);

    //ka was das ist
    $password_stimmt = False;
    $mail_found = False;

    if ($result->num_rows > 0) {
        //iteriert alle datensätz in der Datenbank
        while($row = $result->fetch_assoc()) {
            // sucht eingegebene mail
            if ($email == $row["usermail"] ){

                //falls sie gefunden wird:
                // überprüft passwort
                if (password_verify($_POST["password"], $row["password"])){

                    //ein paar sachen in der SESSION speichern
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["vorname"] = $row["first_name"];
                    include "../1.übung/main.php";
                }
            }
        }
    }
}

