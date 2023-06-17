<?php

if (!isset($_SESSION)){
    session_start();
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Data</title>

    <?php
    include "admin.php";
    ?>
    <link rel="stylesheet" href="../0design/my_design.css">

</head>
<body>
<table class="mx-3 my-5">
    <tr>
<!--        table header -->
        <th class="th">user id</th>
        <th class="th">Nachname</th>
        <th class="th">first_name</th>
        <th class="th">usermail</th>
        <th class="th">password</th>
        <th class="th">Status</th>
        <th class="th">Ändern</th>
        <th class="th">Alle Sales</th>
    </tr>

    <?php
    // Datenbank verbinden

    include_once "../0include/dbaccess.php";
    $sql = "SELECT * FROM login";
    $result = mysqli_query($db_obj, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
                // table row erstellen
                echo "<tr class='my_tr'>";
                //zellen ausgeben mit den Innformationen der Datenbank
                echo "<td class='text-center py-1 right_border '>" . $row["id"] . "</td>";
                echo "<td class='text-center py-1 right_border'>" . $row["username"] . "</td>";
                echo "<td class='text-center py-1 right_border'>" . $row["first_name"] . "</td>";
                echo "<td class='text-center py-1 right_border'>" . $row["usermail"] . "</td>";
                echo "<td class='text-center py-1 right_border'>" . ' ' . "</td>";
                echo "<td class='text-center py-1 right_border'>" .  $row ["status"] . "</td>";
                echo "<td class='text-center py-1 right_border'>" . ' ' . "</td>";
                echo "<td class='text-center py-1 right_border'>" . ' ' . "</td>";
                echo "</tr>";


            // 2. table row erstellen
            echo "<tr class='my_seconde_tr'>";
            echo "<form method='post' class='my-0 py-0 mx-0 px-0 my_form'>";

            // zelle für id als input
            echo "<td class='text-center right_border my_block'>";
            echo "<input type='text' name='person_id' id= 'person_id' class='input ' value='" . $row["id"] . "'>";
            echo "</td>";

            // zelle für nachname als input
            echo "<td class='text-center right_border'>";
            echo "<input type='text' name='username' id= 'username' class='input' value='" . $row["username"] . "'>";
            echo "</td>";

            // zelle für vorname als input
            echo "<td class='text-center right_border'>";
            echo "<input type='text' name='first_name' id = 'first_name' class='input' value='" . $row["first_name"] . "'>";
            echo "</td>";

            // zelle für mail als input
            echo "<td class='text-center right_border'>";
            echo "<input type='text' name='usermail' id= 'usermail' class='input_mail' value='" . $row["usermail"] . "'>";
            echo "</td>";

            // zelle für passwort als input (leeres feld)
            echo "<td class='text-center right_border'>";
            echo "<input type='text' name='password' id= 'password' class='input' placeholder='new pw'>";
            echo "</td>";

            // zelle für Status als dropdown
            echo "<td class='text-center right_border'>";
            echo "<select name='status' id='status' class='input'>";
            echo "<option value='aktiv' " . ($row["status"] == "aktiv" ? "selected" : "") . ">aktiv</option>";
            echo "<option value='inaktiv' " . ($row["status"] == "inaktiv" ? "selected" : "") . ">inaktiv</option>";
            echo "</select>";
            echo "</td>";

            //button zum ändern der stammdaten
            echo "<td class='text-center right_border'>";
            echo "<button type='button' class='button_2' onclick='updateRow(this) '>Update</button>";
            echo "</td>";

            //button um die buchungen von bestimmten benutzer anzeigen
            echo "<td class='text-center right_border'>";
            echo "<button type='submit' class='button_2' formaction='./show_user_sales.php'>Sales anzeigen</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";

        }
    }
    mysqli_close($db_obj);
    ?>
</table>



</body>
<script>
    //funktion um stammdaten zu ändern
    function updateRow(button) {
        var form = button.parentNode.parentNode.firstElementChild;
        var username = form.elements["username"].value;
        var first_name = form.elements["first_name"].value;
        var usermail = form.elements["usermail"].value;
        var id = form.elements["person_id"].value;
        var password = form.elements["password"].value;
        var user_status = form.elements["status"].value;
        // http request schicken um daten zu verarbeiten
        var xhttp = new XMLHttpRequest();
        var url= "update_user_data.php"
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.send("id=" + id +"&username=" + username + "&first_name=" + first_name + "&usermail=" + usermail + "&password=" + password + "&status=" + user_status);
        //bei erfolg -> msg und refresh
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Refresh the page after the delete request has been processed
                window.alert("Erfolgreich geändert!")
                window.location.reload();
            }
        };
    }
    //funktion um die buchungen von den jeweiligen benutzer anzuschauen
    function show_all_res(button) {
        window.location.assign("./show_user_sales.php");
    }


</script>

</html>
<?php
include_once "../0include/footer.php";