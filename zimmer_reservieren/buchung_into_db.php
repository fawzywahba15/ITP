<?php
if(!isset($_SESSION))
{
    session_start();
}


if (isset($_SESSION['formData'])){
    $_POST = $_SESSION['formData'];
}


$preis = $_POST["gesamtpreis"];
$anzahl_nights=$_POST["anzahl_nights"];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = strtolower( $_POST['email']);
$phone = $_POST['phone'];
$arrival_date = $_POST['arrival_date'];
$departure_date = $_POST['departure_date'];
$room_type = $_POST['room_type'];
$breakfast = isset($_POST['breakfast']) ? "ja" : "nein";
$Parkplatz = isset($_POST['Parkplatz']) ? "ja" : "nein";
$haustier = isset($_POST['Haustier']) ? "ja" : "nein";
$status = "neu";
if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($arrival_date) || empty($departure_date) || empty($room_type)) {
    $error = "Error: All fields are required.";
}else if ($arrival_date > $departure_date){
    $error = "Abreise Datum muss nach dem Anreise Datum sein!";
}else{
    $success = "Buchung erfolgreich!";
    $host = 'localhost';
    $user = 'fawzy';
    $password = 'mypassword';
    $database = 'regestrieren';
    $db_obj = new mysqli($host, $user, $password, $database);
    $sql =
        "INSERT INTO `reservierungen` (`usermail`, `room_type`,`anreise_datum`, `abreise_datum`,`garage`, `frühstück`, `Tier`, `status`, `preis`, `anzahl_nights`,`fk_person_id`)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db_obj->prepare($sql);
    $stmt-> bind_param("ssssssssiii"
        , $email, $room_type,$arrival_date, $departure_date, $Parkplatz, $breakfast, $haustier, $status, $preis, $anzahl_nights,$_SESSION["user_id"]);
    if ($stmt->execute()) {
        include_once "zimmer_erfolg.php"; }
    else {
        echo "Error";
    }
    $stmt->close(); $db_obj->close();
}

