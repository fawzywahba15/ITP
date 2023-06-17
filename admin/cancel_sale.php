<?php

// Connect to the database
include_once "../0include/dbaccess.php";

// Check if the 'id' parameter was passed to the script
if (isset($_POST['id'])) {
    $bestellungsnummer = $_POST['id'];
    $sql = "update bestellungen Set `status` = 'storniert'  WHERE id='$bestellungsnummer'";
    $result = mysqli_query($db_obj, $sql);

}

// Close the database connection
mysqli_close($db_obj);

?>
