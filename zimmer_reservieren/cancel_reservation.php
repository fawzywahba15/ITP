<?php

// Connect to the database
$conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");

// Check if the 'id' parameter was passed to the script
if (isset($_POST['id'])) {
    $buchungsnummer = $_POST['id'];
    // Delete the reservation with the specified id from the database
    //"update `login` Set `$spalten_name` = '$data_to_change' where `username` = '$current_user' ";
    $sql = "update reservierungen Set status = 'storniert'  WHERE id='$buchungsnummer'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // The delete was successful, return a success message to the client
        echo "success";
    } else {
        // The delete was not successful, return an error message to the client
        echo "error";
    }
}

// Close the database connection
mysqli_close($conn);

?>
