<?php
require_once ('new_reg.php');
// checkt ob irgendein feld leer ist
if(isset($_POST["lname"]) && !empty($_POST["lname"])
    && isset($_POST["password"]) && !empty($_POST["password"])
    && isset($_POST["email"]) && !empty($_POST["email"])) {
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // db connection
    $db_obj = new mysqli('localhost', 'fawzy', 'mypassword', 'regestrieren');
    //sql befehl
    $sql =
        "INSERT INTO `login` (`username`, `usermail`,`password`, `first_name`, `birthday`)
VALUES (?, ?, ?, ?, ?)";

    $stmt = $db_obj->prepare($sql);
    $stmt-> bind_param("sssss"
        , $username, $mail, $pass, $first_name, $birthday);

    $username = strtolower($_POST["lname"]);
    $mail = strtolower( $_POST["email"]);
    $pass = $_POST["password"];
    $first_name = strtolower($_POST["fname"]);
    $birthday = $_POST["birthdate"];


    if ($stmt->execute()) {
        echo "erfolgreich in die datenbank eingespeichert"; }
    else {
        echo "Error";
    }
    $stmt->close(); $db_obj->close();
}
