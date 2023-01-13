<?php
session_start();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meine Buchungen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include './0include/navbar.php';?>
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
        <th class="th text-center">Status</th>
        <th class="th text-center">Stornieren</th>
    </tr>

    <?php
    $current_user = $_SESSION["email"];
    // Connect to the database and retrieve the data
    $conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
    $sql = "SELECT * FROM reservierungen WHERE usermail = '$current_user'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $arrival = new DateTime($row["anreise_datum"]);
            $today = new DateTime();
            if ($arrival->format('Y-m-d') == $today->format('Y-m-d')) {
                echo "<tr>";
                echo "<td>";
                $room_type = $row["room_type"];
                $conn_2 = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
                $sql_2 = "UPDATE `zimmer` SET anzahl = anzahl - 1 WHERE `zimmer_kategorie` = '$room_type'";
                $result_2 = mysqli_query($conn_2, $sql_2);

                echo "minus ein " . $room_type;
                echo "</td>";
                echo "</tr>";
            } else {
                echo "";
            }
        }
    }
    mysqli_close($conn);
    mysqli_close($conn_2);
    ?>
</table>



</body>

<?php
include_once "./0include/footer.php"
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
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
