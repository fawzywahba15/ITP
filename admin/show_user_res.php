<?php
if (!isset($_SESSION)){
    session_start();
}


if(isset($_POST['status_filter']) && $_POST['status_filter']){
    $_SESSION['status_filter'] = $_POST['status_filter'];
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Data</title>

    <link rel="stylesheet" href="../0design/my_design.css">
    <?php
    include_once "admin.php"
    ?>

    <style>
        .my_tr{
            border: 2px solid #824caf60;
        }
        .my_tr:hover{
            background-color: #824caf60; ;
        }
        td{
            border-right: #824caf60 2px solid;
        }
        .th{
            width: 400px;
            margin-left: 50px;
            margin-right: 50px;
            font-size: large;
            text-align: center;
        }

        .button_2{
            margin: 0;
            margin-bottom: 50px;
            padding: 5px;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 50px;
        }
        .input{
            margin: 0;
            margin-bottom: 50px;
            display: inline-block;
            padding: 0;
            width: 100px;
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
        <th class="th">Status
            <form method="post" action="">
                <select name="status_filter" class="dropdown_filter" id="status_filter">
                    <!--                    php damit das dropdown menü beim value bleibt und sich nicht immer auf "all" zurücksetzt-->
                    <option value="" <?php if(!isset($_POST['status_filter'])) echo 'selected';?>>All</option>
                    <option value="neu" <?php if(isset($_POST['status_filter']) && $_POST['status_filter'] == 'neu') echo 'selected';?>>neu</option>
                    <option value="bestätigt" <?php if(isset($_POST['status_filter']) && $_POST['status_filter'] == 'bestätigt') echo 'selected';?>>bestätigt</option>
                    <option value="storniert" <?php if(isset($_POST['status_filter']) && $_POST['status_filter'] == 'storniert') echo 'selected';?>>storniert</option>
                </select>
                <input type="submit" class="dropdown_submit" value="Filter">
            </form>
        </th>
        <th class="th">ändern!</th>

    </tr>

    <?php



    // Connect to the database and retrieve the data
    $conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
    if (isset($_POST["person_id"])){
        $_SESSION["person_res"] = $_POST["person_id"];
        $_SESSION["person_name"] = $_POST["username"];
    }

    $user_id = $_SESSION["person_res"];

    $sql = "SELECT * FROM reservierungen WHERE fk_person_id = '$user_id'";



    if(isset($_POST['status_filter']) && $_POST['status_filter']!='')
    {
        $status_filter = $_POST['status_filter'];
        $sql = "SELECT * FROM reservierungen WHERE fk_person_id = '$user_id' && status='$status_filter'";
    }

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            echo "<tr class='my_tr'>";
            echo "<form method='post' class='my-0 py-0 mx-0 px-0 my_form'>";



            //zelle mit der buchungsnummer
            echo "<td class='text-center right_border'>";
            echo"<div class='text-center '>";
            echo  $row["id"] ;
            echo "</div>";
            echo "</td>";


            // zelle mit der mail
            echo "<td class='text-center'>" . $row["usermail"] . "</td>";

            //zelle mi room type
            echo "<td class='text-center right_border'>";
            echo '<select id="room_drop" name="room_drop" class="input my-4 mx-1" >';
            $options = ["single room", "double room", "suite"];
            $selected = array();
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





            echo "<td class='text-center'>";
            echo "<input type='date' name='Anreise'  id= 'Anreise' class='input my-4' value='" . $row["anreise_datum"] . "'>";
            echo "</td>";

            echo "<td class='text-center'>";
            echo "<input type='date' name='Abreise' id= 'Abreise' class='input my-4' value='" . $row["abreise_datum"] . "'>";
            echo "</td>";


            echo "<td class='text-center right_border'>";
            echo "<select name='status' id='status' class='input my-4'>";
            echo "<option value='neu' " . ($row["status"] == "neu" ? "selected" : "") . ">neu</option>";
            echo "<option value='bestätigt' " . ($row["status"] == "bestätigt" ? "selected" : "") . ">bestätigt</option>";
            echo "<option value='storniert' " . ($row["status"] == "storniert" ? "selected" : "") . ">storniert</option>";
            echo "</select>";
            echo "</td>";


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
    mysqli_close($conn);
    //todo änedrung der daten
    ?>
</table>
</body>



<script>
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
            var xhttp = new XMLHttpRequest();
            var url= "change_res.php"
            xhttp.open("POST", url, true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send("id=" + id + "&anreise_datum=" + anreise + "&abreise_datum=" + abreise + "&room_type=" + room_type + "&status=" + status);
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

