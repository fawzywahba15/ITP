<?php

if (!isset($_SESSION)) {
    session_start();
}
/*
if(isset($_POST['status_filter']) && $_POST['status_filter']){
    $_SESSION['status_filter'] = $_POST['status_filter'];
}*/

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Data</title>
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
              crossorigin="anonymous">-->

    <link rel="stylesheet" href="../0design/my_design.css">
    <?php
    include "admin.php";
    ?>

    <style>
        .my_tr {
            /*  background-color: ;*/
            border: 2px solid #824caf60;
        }

        .my_tr:hover {
            background-color: #824caf60;
        }

        .th {
            width: 400px;
            margin-left: 50px;
            margin-right: 50px;
            font-size: large;
            text-align: center;
        }

        .ka {
            margin-top: 100px;
            width: 100px;
            margin-left: 50px;
            margin-right: 50px;
        }

        .admin_label {
            margin-top: 10px;
            margin-bottom: 75px;
            margin-right: 10px;
        }

        .button_2 {
            margin: 0;
            margin-bottom: 50px;
            padding: 5px;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 50px;
        }

        .right_border {
            border-right: #824caf40 solid;
        }

        .input {
            margin-top: 0;
            margin-bottom: 50px;
            display: inline-block;
            padding: 0;
            width: 100px;
            margin-left: 0;
            transform: none;

            border-color: #824caf;
        }

        .input:focus {
            width: 110px;
        }

        .dropdown_filter {
            outline: none;
            color: white;
            border: 2px #824caf solid;
            background-color: #824caf;
            border-radius: 10px;
        }

        .dropdown_filter:hover {
            border: 2px #4CAF50 solid;
        }

        .dropdown_submit {
            color: white;
            border: 2px #824caf solid;
            background-color: #824caf;
            border-radius: 10px;
        }

        .dropdown_submit:hover {
            border: 2px #4CAF50 solid;
        }

        .dropdown_submit:active {
            background-color: #4CAF50;
        }
    </style>
</head>

<body>
    <table class="mx-3">
        <tr>
            <th class="th">id</th>
            <th class="th">product name</th>
            <th class="th">preis</th>
            <th class="th">beschreibung</th>
            <th class="th">Produkt Name</th>
            <!--        status dropdown als table header-->


          
            <th class="th">Buchung ändern</th>

        </tr>

        <?php




        // Datenbank verbinden und rows holen

        include_once "../0include/dbaccess.php";
        $sql = "SELECT * FROM verkaufte_produkte";
        if (isset($_POST['status_filter']) && $_POST['status_filter'] != '') {
            //bestimmte rows holen bei filter
            $status_filter = $_POST['status_filter'];
            $sql = "SELECT * FROM verkaufte_produkte WHERE status='$status_filter'";
        }

        $result = mysqli_query($db_obj, $sql);
        if (mysqli_num_rows($result) > 0) {

            //rows in der datenbank durch iterieren
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr class='my_tr'>";

                echo "<form method='post' class='my-0 py-0 mx-0 px-0 my_form'>";

                //zelle mit der Buchungsnummer
                echo "<td class='text-center right_border'>";
                echo "<div class='text-center '>";
                echo  $row["id"];
                echo "</div>";
                echo "</td>";

                //zelle mit mail addresse
                echo "<td class='text-center right_border'>" . $row["fk_person_id"] . "</td>";
                echo "<td class='text-center right_border'>" . $row["usermail"] . "</td>";





                echo "<td class='text-center right_border'>" . $row["fk_produkt_id"] . "</td>";

                //zelle für abreise als input
                echo "<td class='text-center right_border'>" . $row["produkt_name"] . "</td>";



                //zelle für Status als dropdown
                echo "<td class='text-center right_border'>";
                echo "<select name='status' id='status' class='input my-4'>";
                echo "<option value='neu' " . ($row["status"] == "neu" ? "selected" : "") . ">neu</option>";
                echo "<option value='bestätigt' " . ($row["status"] == "bestätigt" ? "selected" : "") . ">bestätigt</option>";
                echo "<option value='storniert' " . ($row["status"] == "storniert" ? "selected" : "") . ">storniert</option>";
                echo "</select>";
                echo "</td>";

                //zelle für button
                echo "<td class='text-center right_border'>";
                echo "<button type='button' class='button_2 my-4' onclick='change_res_data(this)'>Aktualisieren!</button>";
                echo "</td>";


                echo "</form>";
                echo "</tr>";
            }
        } else {
            echo "</table>";
            echo "<div class='warnung py-3 my-3'>";
            echo "Keine Buchungen gefunden!";
            echo "</div>";
        }
        mysqli_close($db_obj);

        ?>
    </table>
</body>



<script>
    //funktion schickt einen http request an 'change_res.php' und ändert die datenbank
    function change_res_data(button) {
        var form = button.parentNode.parentNode.firstElementChild;
        var id = form.nextSibling.textContent;

        var status = form.elements["status"].value;


        var xhttp = new XMLHttpRequest();
        var url = "change_verkauf.php"
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id=" + id + "&status=" + status);
        //falls http request erfolgreich ist dann message ausgeben und reloaden
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Refresh the page after the delete request has been processed
                window.alert("Erfolgreich geändert!")
                window.location.reload();
            }
        };


    }
</script>

</html>