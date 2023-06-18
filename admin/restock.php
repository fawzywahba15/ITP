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
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php
    include "admin.php";
    ?>

    <style>
    .button_2_round{
        width: 150px;
        margin: 10px;
    }
    </style>
</head>
<body>
<table class="mx-3 my-5">
    <tr>
<!--        table header -->
        <th class="th">id</th>
        <th class="th">name</th>
        <th class="th">preis</th>

        <th class="th">Stock</th>
        

    </tr>

    <?php
    // Datenbank verbinden

    include_once "../0include/dbaccess.php";
    $sql = "SELECT * FROM produkte";
    $result = mysqli_query($db_obj, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
                // table row erstellen

                echo "<tr class='my_tr'>";
                echo "<form method='post' class='my-0 py-0 mx-0 px-0 my_form' id='myform'>";
                //zellen ausgeben mit den Innformationen der Datenbank
                echo "<td class='text-center py-1 right_border '>" . $row["id"] . "</td>";
                echo "<td class='text-center py-1 right_border'>" . $row["name"] . "</td>";
                echo "<td class='text-center py-1 right_border'>" . $row["preis"] . "</td>";
                echo "<td class='text-center py-1 right_border'>" . $row["stock"] . "</td>";

                // zelle für vorname als input




            echo "<td class='text-center right_border'>";
            echo "<input type='hidden' name='id' id= 'id' class='input' value='" . $row["id"] . "' >";
            echo "</td>";
            echo "<td class='text-center right_border'>";
            echo "<input type='text' name='stock' id = 'stock' class='input' value='" . $row["stock"] . "'>";
            echo "</td>";
            
            echo "<td class='text-center right_border'>";
            echo "<button type='button' class='button_2_round' onclick='updateRow(this) '>Update</button>";
            echo "</td>";

            echo "</form>";
            echo "</tr>";
            

        }
    }
    mysqli_close($db_obj);
    include_once "../0include/popup.html";
    ?>
</table>



</body>
<script>
    //funktion um stammdaten zu ändern
    function updateRow(button) {
        event.preventDefault();
        var form = button.parentNode.parentNode.firstElementChild;
        var id = form.elements["id"].value;
        var stock = form.elements["stock"].value;
        // http request schicken um daten zu verarbeiten
        var xhttp = new XMLHttpRequest();
        var url= "update_product_stock.php"
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.send("id=" + id +"&stock=" + stock);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                showPopup('', 'Erfolgreich geändert!');
                /*window.alert("Erfolgreich geändert!")
                window.location.reload();*/
            }
        };
    }



</script>

</html>
<?php
include_once "../0include/footer.php";