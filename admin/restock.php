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
        .my_tr{
            border: 2px solid #824caf60;
            border-bottom: 0;

        }
        .my_tr:hover {
            background-color: #824caf60;
        }

        .my_seconde_tr {
            border: 2px solid #824caf60;

        }
        .my_seconde_tr:hover{
            background-color: #824caf60;
        }
        .th{
            width: 400px;
            margin-left: 50px;
            margin-right: 50px;
            font-size: large;
            text-align: center;

        }

        .admin_label{
            margin-top: 10px;
            margin-bottom: 75px;
            margin-right: 10px;
        }
        .button_2{
            margin: 0;
            margin-bottom: 15px;
            margin-top: 15px;
            padding: 5px;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 50px;
        }
        .input{

            margin-bottom: 15px;
            margin-top: 15px;
            display: inline-block;
            margin-left: 0;
            padding: 0;
            width: 100px;
            transform: none;
            alignment: center;
            border-color: #824caf;
        }
        .input:focus{
            width: 110px;
        }
        .input_mail{

            margin-bottom: 15px;
            margin-top: 15px;
            display: inline-block;
            padding: 0;
            margin-left: 0;
            alignment: center;
            width: 100px;
            transform: none;

            border-color: #824caf;
        }
        .input_mail:focus{

            width: 200px;
            border: 3px #2ecc71 solid ;
        }
        .right_border{
            border-right: #824caf60 2px solid;
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
            echo "<button type='button' class='button_2' onclick='updateRow(this) '>Update</button>";
            echo "</td>";

            echo "</form>";
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
                // Refresh the page after the delete request has been processed
                window.alert("Erfolgreich geändert!")
                window.location.reload();
            }
        };
    }



</script>

</html>
<?php
include_once "../0include/footer.php";