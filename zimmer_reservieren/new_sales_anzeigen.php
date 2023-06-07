<?php
include "bestellungen_main.php";


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Meine Bestellungen</title>

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
        .subtable{
            width: 90%;
            margin: 50px;
            border-color: #4CAF5080;
        }
        .subtable_td{
            border-color: #4CAF5080;

        }
        .subtable_td:hover{
            background-color: #4CAF5080;
        }
        .subtable_tr{
            border: 2px solid #4CAF5080;
        }
        .subtable_tr:hover{
            background-color: #4CAF5060;
        }

        .subtable-row{
            border-left: #824caf60 2px solid;
        }

    </style>
</head>
<body>


<table class="mx-3">
    <tr>
        <th class="th">Buchungsnr</th>



        <th class="th">Produkte</th>
        <th class="th">Preis</th>
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
        <th class="th">Stornieren</th>

    </tr>

    <?php
    $current_user_id = $_SESSION["user_id"];
    // Connect to the database and retrieve the data
    include "../0include/dbaccess.php";
    $sql_bestellungen = "SELECT * FROM `bestellungen` WHERE `person_fk` = '$current_user_id' ORDER BY id desc";



    if(isset($_POST['status_filter']) && $_POST['status_filter']!='')
    {
        $status_filter = $_POST['status_filter'];

        $sql_bestellungen = "SELECT * FROM `bestellungen` WHERE `person_fk` = '$current_user_id' && status='$status_filter' ORDER BY id desc";
    }

    $result_bestellungen = mysqli_query($db_obj, $sql_bestellungen);
    if (mysqli_num_rows($result_bestellungen) > 0) {
        while ($row_bestellungen = mysqli_fetch_assoc($result_bestellungen)) {
            //todo buchungsnummer display
            //echo "<td class='text-center right_border'>" . $row_bestellungen["id"] . "</td>";
            $productData = array();

            $bestellung_erstellen_fk = $row_bestellungen['bestellung_erstellen_fk'];

            // Step 4: Retrieve the corresponding "bestellung_erstellen" record
            $sql_bestellung_erstellen = "SELECT * FROM `bestellung_erstellen` WHERE `id` = $bestellung_erstellen_fk";
            $result_bestellung_erstellen = mysqli_query($db_obj, $sql_bestellung_erstellen);
            $row_bestellung_erstellen = mysqli_fetch_assoc($result_bestellung_erstellen);



            for ($i = 1; $i <= 10; $i++) {
                $produkt_fk = $row_bestellung_erstellen["produkt_" . $i];

                // Check if the "produkt_fk" is null
                if ($produkt_fk === null) {
                    break; // Exit the loop if null value is encountered
                }

                // Retrieve the product name from the "produkte" table
                $sql_produkte = "SELECT * FROM produkte WHERE id = $produkt_fk";
                $result_produkte = mysqli_query($db_obj, $sql_produkte);
                $row_produkte = mysqli_fetch_assoc($result_produkte);

                $productData[] = array(
                    'name' => $row_produkte['name'],
                    'price' => $row_produkte['preis']
                );
                mysqli_free_result($result_produkte);
                //todo das funktioniert
                //echo "<td class='text-center right_border'>" . $row_produkte["name"] . "</td>";



                // Clean up the resources after each iteration

            }
            $json = json_encode($productData);
            echo "<form>";
            echo "<tr class='my_tr text-center'>";



            echo "<td><p>$row_bestellungen[id]</p></td>";
            echo "<td><button class='collapse-btn button_2  py-2 my-3' data-product-data='" . htmlspecialchars($json, ENT_QUOTES, 'UTF-8') . "'>Produkte Anzeigen!</button></td>";


            echo "<td class='text-center right_border'>" . $row_bestellungen["preis"] . "</td>";


            echo "<td class='text-center right_border'>" . $row_bestellungen["status"] . "</td>";

            echo "<td>";
            echo "<button type='submit' class='button_2 py-2 my-3 px-5' onclick='delete_row(this) '>Stornieren!</button>";
            echo "</td>";
            echo "</tr>";
            echo "</form>";

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
        var url = "cancel_sale.php";
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
<script>

    $(document).ready(function() {
        $('.collapse-btn').on('click', function(e) {
            e.preventDefault();
            var parentRow = $(this).closest('tr');

            // Check if details are already expanded
            if (parentRow.next().hasClass('subtable-row')) {
                // If details are already expanded, remove them
                parentRow.nextUntil(':not(.subtable-row)').remove();
            } else {
                // If details are not expanded, add them
                var productData = JSON.parse($(this).attr('data-product-data'));

                // Create a new table, tbody and add the header row
                var newTable = $("<table class='subtable text-center'>");
                var newTbody = $("<tbody>");
                var headerRow = $("<tr>");
                var thIndex = $("<th class='subtable_th'>").text("Index");
                var thName = $("<th class='subtable_th'>").text("Name");
                var thPrice = $("<th class='subtable_th'>").text("Preis");
                headerRow.append(thIndex, thName, thPrice);
                newTable.append(headerRow);

                $.each(productData, function(index, product) {
                    var tr = $('<tr>').addClass('product-row my_tr text-center subtable_tr');
                    var tdIndex = $('<td>').addClass('subtable_td').text(index + 1); // +1 if you want the index to start from 1 instead of 0
                    var tdName = $('<td>').addClass('subtable_td').text(product.name);
                    var tdPrice = $('<td>').addClass('subtable_td').text(product.price);
                    tr.append(tdIndex, tdName, tdPrice);
                    newTbody.append(tr);
                });

                // Add the tbody to the table
                newTable.append(newTbody);

                // Insert the new table into a new row in the main table
                var newRow = $("<tr>").addClass('subtable-row');
                var newCell = $("<td>").attr("colspan", 12); // colspan adjusted to match the number of columns
                newCell.append(newTable);
                newRow.append(newCell);
                newRow.insertAfter(parentRow);
            }
        });
    });










</script>
</html>
