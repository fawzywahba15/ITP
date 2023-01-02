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

</head>
<body>
<table>
    <tr>
        <th>username</th>
        <th>first_name</th>
        <th>usermail</th>
        <th>Action</th>
    </tr>
    <?php
    // Connect to the database and retrieve the data
    $conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
    $sql = "SELECT * FROM login";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["usermail"] . "</td>";
            echo "<td>";
            echo "<form>";
            echo "<input type='text' name='username' value='" . $row["username"] . "'>";
            echo "<input type='text' name='first_name' value='" . $row["first_name"] . "'>";
            echo "<input type='text' name='usermail' value='" . $row["usermail"] . "'>";
            echo "<button type='button' onclick='updateRow(this)'>Update</button>";
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
    function updateRow(button) {
        // Get the parent form element of the button
        var form = button.parentNode;

        // Get the values of the form elements
        var username = form.elements["username"].value;
        var first_name = form.elements["first_name"].value;
        var usermail = form.elements["usermail"].value;

        // Send an HTTP request to the server to update the data in the database
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "update_data.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("column1=" + username + "&column2=" + first_name + "&column3=" + usermail);
    }

</script>
</html>
