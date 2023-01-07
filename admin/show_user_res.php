<?php

if (!isset($_SESSION)){
    session_start();
}

var_dump($_POST);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../0design/my_design.css">

    <?php include "../0include/navbar.php";?>
    <style>
        .th{
            width: 400px;
            margin-left: 50px;
            margin-right: 50px;
            font-size: large;
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
        .input{
            margin-top: 0;
            margin-bottom: 50px;
            display: inline-block;
            margin-left: 0;
            padding: 0;
            width: 100px;
            transform: none;

            border-color: #824caf;
        }
        .input:focus{
            width: 110px;
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
        <th class="th">Bestätigen</th>
        <th class="th">Stornieren</th>
    </tr>

    <?php

    $user_id = $_POST["person_id"];


    // Connect to the database and retrieve the data
    $conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
    $sql = "SELECT * FROM reservierungen WHERE fk_person_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            echo "<tr class='my_tr'>";





            echo "<form method='post' class='my-0 py-0 mx-0 px-0 my_form'>";
            echo "<td class='ka'>" . $row["id"] . "</td>";
            echo "<td class='ka'>" . $row["usermail"] . "</td>";
            echo "<td class='ka'>" . $row["room_type"] . "</td>";
            echo "<td class='ka'>" . $row["anreise_datum"] . "</td>";
            echo "<td class='ka'>" . $row["abreise_datum"] . "</td>";



            echo "<td>";
            echo "<label id='buchungsnummer'  for='usermail'>Anreise: </label>";
            echo "<input type='date' name='Anreise' id= 'Anreise' class='input' value='" . $row["anreise_datum"] . "'>";
            echo "</td>";
            echo "<td>";
            echo "<label for='usermail'>Abreise: </label>";
            echo "<input type='date' name='Abreise' id= 'Abreise' class='input' value='" . $row["anreise_datum"] . "'>";
            echo "</td>";

            echo "<td>";
            echo "<button type='button' class='button_2' onclick='confirm_res(this)'>bestätigen</button>";

            echo "</td>";
            echo "<td>";
            echo "<button type='button' class='button_2' onclick='cancel_res(this)'>Stornieren</button>";
            echo "</td>";
            echo "</form>";
            echo "</tr>";

        }
    }
    mysqli_close($conn);
    ?>
</table>



</body>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous">
</script>

<script>
    function confirm_res(button) {
        var form = button.parentNode.parentNode.firstElementChild;
        var id = form.nextSibling.textContent;
        var xhttp = new XMLHttpRequest();
        var url= "confirm_user_res.php"
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id=" + id );
        window.alert("Buchung bestätigt!")
    }

    function cancel_res(button) {
        var form = button.parentNode.parentNode.firstElementChild;
        var id = form.nextSibling.textContent;
        window.alert(id)
        var xhttp = new XMLHttpRequest();
        var url= "cancel_user_res.php"
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id=" + id );
        window.alert("Buchung storniert!")
    }
</script>

</html>

