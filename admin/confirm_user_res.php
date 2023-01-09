<?php

// Connect to the database
$conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");

// Check if the 'id' parameter was passed to the script
if (isset($_POST['id'])) {
    $buchungsnummer = $_POST['id'];
    // Delete the reservation with the specified id from the database
    //"update `login` Set `$spalten_name` = '$data_to_change' where `username` = '$current_user' ";
    $sql = "update reservierungen Set status = 'bestätigt'  WHERE id='$buchungsnummer'";
    $result = mysqli_query($conn, $sql);

}


mysqli_close($conn);

?>
