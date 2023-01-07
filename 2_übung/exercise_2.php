<?php
require_once ('new_reg.php');
if(isset($_POST["lname"]) && !empty($_POST["lname"])
    && isset($_POST["password"]) && !empty($_POST["password"])
    && isset($_POST["email"]) && !empty($_POST["email"])) {
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
//create $db_obj, create sql statement, prepare it and bind the variables to it
    $host = 'localhost';
    $user = 'fawzy';
    $password = 'mypassword';
    $database = 'regestrieren';
    $db_obj = new mysqli($host, $user, $password, $database);
    $sql =
        "INSERT INTO `login` (`username`, `usermail`,`password`, `first_name`, `birthday`)
VALUES (?, ?, ?, ?, ?)";
    $stmt = $db_obj->prepare($sql);
    $stmt-> bind_param("sssss"
        , $username, $mail, $pass, $first_name, $birthday);
    $username = $_POST["lname"];
    $mail = strtolower( $_POST["email"]);
    $pass = $_POST["password"];
    $first_name = $_POST["fname"];
    $birthday = $_POST["birthdate"];
/*    $stmt->execute();*/

    if ($stmt->execute()) {
        echo ""; }
    else {
        echo "Error";
    }
    $stmt->close(); $db_obj->close();
}
