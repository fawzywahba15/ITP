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
        .input_mail{
            margin-top: 0;
            margin-bottom: 50px;
            display: inline-block;
            grid-auto-rows: auto;
            grid-template-columns: 50%;

            margin-left: 0;
            text-align: center ;
            border: 3px #824caf solid ;
            padding: 0;
            width: 140px;
            outline: none;
            border-radius: 25px;
            transition-duration: 0.4s;
        }
        .input_mail:focus{
            width: 200px;
            border: 3px #2ecc71 solid ;
        }
    </style>
</head>
<body>
<table class="mx-3">
    <tr>
        <th class="th">user id</th>
        <th class="th">username</th>
        <th class="th">first_name</th>
        <th class="th">usermail</th>
        <th class="th">password</th>
        <th class="th">Ändern</th>
    </tr>

    <?php
    // Connect to the database and retrieve the data
    $conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
    $sql = "SELECT * FROM login";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            echo "<tr class='my_tr'>";
            echo "<td class='ka'>" . $row["id"] . "</td>";
            echo "<td class='ka'>" . $row["username"] . "</td>";
            echo "<td class='ka'>" . $row["first_name"] . "</td>";
            echo "<td class='ka'>" . $row["usermail"] . "</td>";
            echo "<td class='ka'>" . ' ' . "</td>";
            echo "</tr>";



            echo "<tr>";

            echo "<form class='my-0 py-0 mx-0 px-0 my_form'>";
            echo "<td>";

            echo "<label for='id'>ID: </label>";
            echo "<input type='text' name='id' id= 'id' class='input' value='" . $row["id"] . "'>";
            echo "</td>";
            echo "<td>";
            echo "<label for='username'>Username: </label>";
            echo "<input type='text' name='username' id= 'username' class='input' value='" . $row["username"] . "'>";
            echo "</td>";
            echo "<td>";
            echo "<label for='vorname'>Vorname: </label>";
            echo "<input type='text' name='first_name' id = 'first_name' class='input' value='" . $row["first_name"] . "'>";
            echo "</td>";
            echo "<td>";
            echo "<label for='usermail'>Usermail: </label>";
            echo "<input type='text' name='usermail' id= 'usermail' class='input_mail' value='" . $row["usermail"] . "'>";
            echo "</td>";
            echo "<td>";
            echo "<label for='password'>password: </label>";
            echo "<input type='text' name='password' id= 'password' class='input_mail' placeholder='new pw'>";
            echo "</td>";
            echo "<td>";
            echo "<button type='button' class='button_2' onclick='updateRow(this)'>Update</button>";
            echo "</form>";
            echo "</td>";


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

    function updateRow(button) {
        // Get the parent form element of the button

/*        window.alert(button.parentNode.parentNode.firstElementChild.nodeName);*/
        var form = button.parentNode.parentNode.firstElementChild;

        // Get the values of the form elements
        var username = form.elements["username"].value;
        var first_name = form.elements["first_name"].value;
        var usermail = form.elements["usermail"].value;
        var id = form.elements["id"].value;
        var password = form.elements["password"].value;
        // Send an HTTP request to the server to update the data in the database
        var xhttp = new XMLHttpRequest();
        var url= "update_data.php"
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.send("id=" + id +"&username=" + username + "&first_name=" + first_name + "&usermail=" + usermail + "&password=" + password);
        window.alert("Erfolgreich geändert!");
        //window.location.reload();
    }

</script>
</html>
