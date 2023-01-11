<?php
/*var_dump($_POST);*/
/*$buchungsnummer = $_POST["buchungsnummer"];
$anreise = $_POST["Anreise"];*/
/*$abreise = $_POST["Abreise"];*/
/*$room_type = $_POST["dropdown"];*/
$conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");

if (isset($_POST['id'])) {
    $buchungsnummer = $_POST['id'];
    $anreise = $_POST["anreise_datum"];
    $abreise = $_POST["abreise_datum"];
    $room_type = $_POST["room_type"];
    $sql = "UPDATE reservierungen SET room_type = '$room_type', `anreise_datum` = '$anreise', abreise_datum = '$abreise' WHERE id = '$buchungsnummer'";

    $result = mysqli_query($conn, $sql);

}







mysqli_close($conn);

?>