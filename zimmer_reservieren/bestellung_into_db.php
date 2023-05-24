<?php
if(!isset($_SESSION))
{
    session_start();
}



$user_id = $_SESSION['user_id'];
$produkt_id = $_POST['produkt_id'];
$produkt_name = $_POST["produkt_name"];
$produkt_preis = $_POST["produkt_preis"];
$email = strtolower( $_SESSION['email']);






if (empty($user_id) || empty($produkt_id) || empty($produkt_name) || empty($produkt_preis) || empty($email)) {
    $error = "Error: All fields are required.";
}else{
        $success = "Buchung erfolgreich!";
        include "../0include/dbaccess.php";
        $sql =
            "INSERT INTO `warenkorb` (`usermail`, `fk_person_id`,`fk_produkt_id`, `produkt_name`,`produkt_preis`)
VALUES (?, ?, ?, ?, ?)";
        $stmt = $db_obj->prepare($sql);
        $stmt-> bind_param("siisi"
            , $email, $user_id,$produkt_id, $produkt_name, $produkt_preis);
        if ($stmt->execute()) {
            include_once "bestellung_erfolg.php"; }
        else {
            echo "Error";
        }
        $stmt->close(); $db_obj->close();
    }



