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
        .th{
            width: 400px;
            margin-left: 50px;
            margin-right: 50px;
            font-size: large;

        }
        .tr{
            border: 2px #824caf40 solid;
            border-radius: 20px;
        }
        .tr:hover{
            background-color: #824caf40;
        }
        .meins{
            border-right: #824caf40 solid;
        }
        .button_2:hover{
            border: #2ecc71 2px solid;
        }
    </style>
</head>
<body>


<table class="mx-3">
    <tr>
        <th class="th text-center">Buchungnummer</th>
        <th class="th text-center">E-mail</th>
        <th class="th text-center">Anreise Datum</th>
        <th class="th text-center">Abreise Datum</th>
        <th class="th text-center">Zimmer Kategorie</th>
        <th class="th">extras</th>
        <th class="th text-center">Status</th>
        <th class="th text-center">Stornieren</th>
    </tr>

    <?php
    $current_user = $_SESSION["email"];
    // Connect to the database and retrieve the data
    include "../0include/dbaccess.php";
    $sql = "SELECT * FROM reservierungen WHERE usermail = '$current_user'";
    $result = mysqli_query($db_obj, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {


            echo "<tr class='tr'>";
            echo "<form method='post' class='my-0 py-0 mx-0 px-0 my_form'>";


/*            echo "<h6 id='buchungsnummer' class='hidden'>" . $row["id"] . "</h6>";*/
            echo"<td id='buchungsnummer' class='meins'>" . $row["id"] . "</td>";
            echo "<td class='text-center meins'>" . $row["usermail"] . "</td>";
            echo "<td class='text-center meins'>" . $row["anreise_datum"] . "</td>";
            echo "<td class='text-center meins'>" . $row["abreise_datum"] . "</td>";
            echo "<td class='text-center meins'>" . $row["room_type"] . "</td>";
            //zelle für extras
            echo "<td class='text-center right_border'>";
            echo"<div class='text-center '>";
            echo  "garage: " .$row["garage"] . "<br>" ;
            echo  "breakfast: " .$row["frühstück"] . "<br>"  ;
            echo  "Hausier: " .$row["Tier"] . "<br>"  ;
            echo "</div>";
            echo "</td>";

            echo "<td class='text-center meins'>" . $row["status"] . "</td>";
            echo "<td class='text-center meins'>";
            echo "<button type='button' class='button_2 py-2 my-3' onclick='delete_row(this) '>Stornieren!</button>";

            echo "</td>";
            echo "</form>";
            echo "</tr>";

        }
    }else {
        echo "<tr class='tr'>";
        echo "<td>" ;
        echo "Keine Buchungen gefunden!";
        echo "</td>";
        echo "</tr>";
    }
    mysqli_close($db_obj);
    ?>
</table>



</body>

<?php
include_once "../0include/footer.php"
?>

<script>

    function delete_row(button) {
        // Get the values of the form elements

        var form = button.parentNode.parentNode.firstElementChild;
        var id = form.nextSibling.textContent;

        // Send an HTTP request to the server to update the data in the database
        var xhttp = new XMLHttpRequest();
        var url = "cancel_reservation.php";
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id=" + id);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Refresh the page after the delete request has been processed
                window.alert("Erfolgreich storniert!")
                window.location.reload();
            }
        };
    }


</script>
</html>
