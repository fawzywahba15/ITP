<?php
if(!isset($_SESSION)) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    //zu databaser comparen
    $db_host = 'localhost';
    $db_user = 'fawzy';
    $db_password = 'mypassword';
    $database = 'regestrieren';
    $db_obj = new mysqli($db_host, $db_user, $db_password, $database);
    $sql = "SELECT * FROM `login`";
    $result = $db_obj->query($sql);
    $password_stimmt = False;
    $mail_found = False;
    if ($result->num_rows > 0) {
        //iteriert alle datensätz in der Datenbank
        while($row = $result->fetch_assoc()) {
            // sucht email
            if ($email == $row["usermail"] ){
                $mail_found = True;


                $_SESSION["username"] = $row["username"];
                // überprüft passwort
                if (password_verify($_POST["password"], $row["password"])){
                    $password_stimmt = True;


                        $_SESSION["username"] = $row["username"];

                }
            }
        }
    }

    if ($password_stimmt && $mail_found){

    include "../1.übung/main.php";
    }
}

