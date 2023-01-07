<?php

// Connect to the database
$conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");

// Check if the 'id' parameter was passed to the script
if (isset($_POST['id'])) {
    $buchungsnummer = $_POST['id'];
    $sql = "update reservierungen Set status = 'storniert'  WHERE id='$buchungsnummer'";
    $result = mysqli_query($conn, $sql);

}
if ($result) {
    echo "success";
} else {
    echo "error";
}

// Close the database connection
mysqli_close($conn);

?>
