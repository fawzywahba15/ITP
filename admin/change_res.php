<?php

//aktualisiert die reservierung in der datenbank
/*$db_obj = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");*/
include_once "../0include/dbaccess.php";

if (isset($_POST['id'])) {
    $buchungsnummer = $_POST['id'];
    $anreise = $_POST["anreise_datum"];
    $abreise = $_POST["abreise_datum"];
    $room_type = $_POST["room_type"];
    $status = $_POST["status"];
    $sql = "UPDATE reservierungen SET room_type = '$room_type', `anreise_datum` = '$anreise', abreise_datum = '$abreise', `status` = '$status' WHERE id = '$buchungsnummer'";

    $result = mysqli_query($db_obj, $sql);

}

mysqli_close($db_obj);

?>