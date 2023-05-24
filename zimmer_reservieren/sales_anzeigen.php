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

    </style>
</head>
<body>


<table class="mx-3">
    <tr>
        <th class="th">Buchungsnr</th>
        <th class="th">Person ID</th>
        <th class="th">Email</th>
        <th class="th">Produkt ID</th>
        <th class="th">Produkt Name</th>
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
    $current_user = $_SESSION["email"];
    // Connect to the database and retrieve the data
    include "../0include/dbaccess.php";
    $sql = "SELECT * FROM verkaufte_produkte WHERE usermail = '$current_user'";



    if(isset($_POST['status_filter']) && $_POST['status_filter']!='')
    {
        $status_filter = $_POST['status_filter'];

        $sql = "SELECT * FROM verkaufte_produkte WHERE usermail = '$current_user' && status='$status_filter'";
    }

    $result = mysqli_query($db_obj, $sql);
    if (mysqli_num_rows($result) > 0) {
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
            echo "<td class='text-center right_border'>" . $row["fk_person_id"] . "</td>";
            echo "<td class='text-center right_border'>" . $row["usermail"] . "</td>";





            echo "<td class='text-center right_border'>" . $row["fk_produkt_id"] . "</td>";

            //zelle für abreise als input
            echo "<td class='text-center right_border'>" . $row["produkt_name"] . "</td>";



            //zelle für Status
            echo "<td class='text-center meins'>" . $row["status"] . "</td>";

            //zelle für button
            echo "<td class='text-center meins'>";
            echo "<button type='button' class='button_2 py-2 my-3' onclick='delete_row(this) '>Stornieren!</button>";
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
</html>
