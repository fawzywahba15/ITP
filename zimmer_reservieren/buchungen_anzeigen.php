<?php
include "zimmer_main.php";


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meine Buchungen</title>
    <style>

    </style>
</head>
<body>


<table class="mx-3">
    <tr>
        <th class="th">Buchungnummer</th>
        <th class="th">E-mail</th>
        <th class="th">Anreise Datum</th>
        <th class="th">Abreise Datum</th>
        <th class="th">Zimmer Kategorie</th>
        <th class="th">Status</th>
    </tr>

    <?php
    $current_user = $_SESSION["email"];
    // Connect to the database and retrieve the data
    $conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
    $sql = "SELECT * FROM reservierungen WHERE usermail = '$current_user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {


            echo "<tr>";

            echo "<form method='post' class='my-0 py-0 mx-0 px-0 my_form'>";

/*            echo "<h6 id='buchungsnummer' class='hidden'>" . $row["id"] . "</h6>";*/
            echo"<td id='buchungsnummer'>" . $row["id"] . "</td>";
            echo "<td class=''>" . $row["usermail"] . "</td>";
            echo "<td class=''>" . $row["anreise_datum"] . "</td>";
            echo "<td class=''>" . $row["abreise_datum"] . "</td>";
            echo "<td class=''>" . $row["room_type"] . "</td>";
            echo "<td>";
            echo "<button type='button' class='button_2 py-2 my-3' onclick='delete_row(this) '>Stornieren!</button>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";

        }
    }
    mysqli_close($conn);
    ?>
</table>



</body>
<script>

    function delete_row(button) {
        // Get the values of the form elements

        //var form = button.parentNode.parentNode.firstElementChild
        var id = document.getElementById("buchungsnummer").textContent;
        // Send an HTTP request to the server to update the data in the database
        var xhttp = new XMLHttpRequest();
        var url = "cancel_reservation.php";
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id=" + id);

        window.location.reload();
    }


</script>
</html>
