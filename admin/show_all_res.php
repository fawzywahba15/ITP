<?php

if (!isset($_SESSION)){
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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
        .my_tr{
            background-color: ;
            border: 2px solid #824caf60;
        }
        .my_tr:hover{
            background-color: #824caf60;
        }
        .th{
            width: 400px;
            margin-left: 50px;
            margin-right: 50px;
            font-size: large;
            text-align: center;
        }
        .ka{
            margin-top: 100px;
            width: 100px;
            margin-left: 50px;
            margin-right: 50px;
        }
        .admin_label{
            margin-top: 10px;
            margin-bottom: 75px;
            margin-right: 10px;
        }
        .button_2{
            margin: 0;
            margin-bottom: 50px;
            padding: 5px;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 50px;
        }
        .right_border{
            border-right: #824caf40 solid;
        }
        .input{
            margin-top: 0;
            margin-bottom: 50px;
            display: inline-block;
            padding: 0;
            width: 100px;
            margin-left: 0;
            transform: none;

            border-color: #824caf;
        }
        .input:focus{
            width: 110px;
        }
        .warnung{
            border-radius: 20px;
            text-align: center;
            width: 300px;
            border: 2px red solid;
            margin-bottom: 50px;
            margin-left: 50%;
            transform: translate(-50%, 0%);
            transition-duration: 0.4s;
        }
        .warnung:hover{
            background-color: #FF000080;
        }
        .dropdown_filter{
            outline: none;
            color: white;
            border: 2px #824caf solid;
            background-color: #824caf;
            border-radius: 10px;
        }
        .dropdown_filter:hover{
            border: 2px #4CAF50 solid;
        }
        .dropdown_submit{
            color: white;
            border: 2px #824caf solid;
            background-color: #824caf;
            border-radius: 10px;
        }
        .dropdown_submit:hover{
            border: 2px #4CAF50 solid;
        }
        .dropdown_submit:active{
            background-color: #4CAF50;
        }

    </style>
</head>
<body>
<table class="mx-3">
    <tr>
        <th class="th">Buchungsnr</th>
        <th class="th">Email</th>
        <th class="th">Zimmer Kategorie</th>
        <th class="th">Anreise</th>
        <th class="th">Abreise</th>
<!--        status dropdown als table header-->
        <th class="th">Status
            <form method="post" action="">
                <select name="status_filter" class="dropdown_filter" id="status_filter">
                    <!-- php damit das dropdown menü beim value bleibt und sich nicht immer auf "all" zurücksetzt-->
                    <option value="" <?php if(!isset($_POST['status_filter'])) echo 'selected';?>>All</option>
                    <option value="neu" <?php if(isset($_POST['status_filter']) && $_POST['status_filter'] == 'neu') echo 'selected';?>>neu</option>
                    <option value="bestätigt" <?php if(isset($_POST['status_filter']) && $_POST['status_filter'] == 'bestätigt') echo 'selected';?>>bestätigt</option>
                    <option value="storniert" <?php if(isset($_POST['status_filter']) && $_POST['status_filter'] == 'storniert') echo 'selected';?>>storniert</option>
                </select>
                <input type="submit" class="dropdown_submit" value="Filter">
            </form>
        </th>
        <th class="th">Buchung ändern</th>

    </tr>

    <?php




    // Datenbank verbinden und rows holen

    include_once "../0include/dbaccess.php";
    $sql = "SELECT * FROM reservierungen";
    if(isset($_POST['status_filter']) && $_POST['status_filter']!='')
    {
        //bestimmte rows holen bei filter
        $status_filter = $_POST['status_filter'];
        $sql = "SELECT * FROM reservierungen WHERE status='$status_filter'";
    }

    $result = mysqli_query($db_obj, $sql);
    if (mysqli_num_rows($result) > 0) {

        //rows in der datenbank durch iterieren
        while($row = mysqli_fetch_assoc($result)) {

            echo "<tr class='my_tr'>";

            echo "<form method='post' class='my-0 py-0 mx-0 px-0 my_form'>";

            //zelle mit der Buchungsnummer
            echo "<td class='text-center right_border'>";
            echo"<div class='text-center '>";
            echo  $row["id"] ;
            echo "</div>";
            echo "</td>";

            //zelle mit mail addresse
            echo "<td class='text-center right_border'>" . $row["usermail"] . "</td>";


            //zelle mit room type
            echo "<td class='text-center right_border'>";
            echo '<select id="room_drop" name="room_drop" class="input my-4 mx-1" >';
            $options = ["single room", "double room", "suite"];
            $selected = array();
            //damit das richtige room type selected wird in der dropdown menu
            switch ($row["room_type"]) {
                case "single room":
                    $selected[0] = ' selected';
                    break;
                case "double room":
                    $selected[1] = ' selected';
                    break;
                default:
                    $selected[2] = ' selected';
                    break;
            }
            foreach ($options as $key => $option) {
                echo "<option value='$option' {$selected[$key]}>$option</option>";
            }
            echo '</select>';
            echo "</td>";


            //zelle für anreise als input
            echo "<td class='text-center right_border'>";
            echo "<input type='date' name='Anreise'  id= 'Anreise' class='input my-4' value='" . $row["anreise_datum"] . "'>";
            echo "</td>";

            //zelle für abreise als input
            echo "<td class='text-center right_border'>";
            echo "<input type='date' name='Abreise' id= 'Abreise' class='input my-4' value='" . $row["abreise_datum"] . "'>";
            echo "</td>";


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
    }else {
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
    function change_res_data(button){
        var form = button.parentNode.parentNode.firstElementChild;
        var id = form.nextSibling.textContent;

        var anreise = form.elements["Anreise"].value;
        var abreise = form.elements["Abreise"].value;
        var room_type = form.elements["room_drop"].value;
        var status = form.elements["status"].value;
        if (anreise > abreise){
            window.location.reload();
            //falls das neue anreisedatum > abreisedatum
            window.alert("Anreise Datum kann nicht größer als Abreise Datum sein!");
        }else{
            //sonst http request senden
            var xhttp = new XMLHttpRequest();
            var url= "change_res.php"
            xhttp.open("POST", url, true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send("id=" + id + "&anreise_datum=" + anreise + "&abreise_datum=" + abreise + "&room_type=" + room_type + "&status=" + status);
            //falls http request erfolgreich ist dann message ausgeben und reloaden
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Refresh the page after the delete request has been processed
                    window.alert("Buchung geändert!")
                    window.location.reload();
                }
            };
        }

    }

</script>

</html>

