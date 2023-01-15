<?php

// Connect to the database
include_once "../0include/dbaccess.php";

// Check if the 'id' parameter was passed to the script
if (isset($_POST['id'])) {
    $buchungsnummer = $_POST['id'];
    $sql = "update reservierungen Set status = 'storniert'  WHERE id='$buchungsnummer'";
    $result = mysqli_query($db_obj, $sql);

}

// Close the database connection
mysqli_close($db_obj);

?>
