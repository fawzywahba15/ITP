<?php



function show_all(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//zu databaser comparen
        $db_host = 'localhost';
        $db_user = 'fawzy';
        $db_password = 'mypassword';
        $database = 'regestrieren';
        $db_obj = new mysqli($db_host, $db_user, $db_password, $database);
        $sql =
            "SELECT * FROM `login`";
        $result = $db_obj->query($sql);
        $user_count = 0;
        if ($result->num_rows > 0) {
            //iteriert alle datensätz in der Datenbank
            while ($row = $result->fetch_assoc()) {
                //daten ausgaben von jedem user
                echo "<div class='my-5'>";
                echo "user " . $user_count . ":" . "<br>";
                echo "username: "; echo $row["username"] . "<br>";
                echo "first name: "; echo $row["first_name"] . "<br>";
                echo "usermail: "; echo $row["usermail"] . "<br>";
                echo "birthday: "; echo $row["birthday"] . "<br>";
                echo "admin rechte: "; echo $row["admin"] . "<br>";
                $user_count++;
                "</div>";
            }
        }

// Create an SQL query
        $sql_2 = "SELECT * FROM login";

// Execute the query
        $result = $db_obj->query($sql_2);
        echo "<select>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['usermail'] . "</option>";
        }
        echo "</select>";


        $db_obj->close();

    }
}

function show_db_columns(){

// Connect to the database
    $db_host = 'localhost';
    $db_user = 'fawzy';
    $db_password = 'mypassword';
    $database = 'regestrieren';
    $db_conn = mysqli_connect($db_host, $db_user, $db_password, $database);

// Check the connection
    if (!$db_conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

// Query the database to retrieve the column names
    $result = mysqli_query($db_conn, 'SHOW COLUMNS FROM login');

// Check the query result
    if (!$result) {
        die('Error: ' . mysqli_error($db_conn));
    }

// Start the HTML dropdown menu
    echo '<select>';

// Loop through the query result and add each column name as an option
    while ($row = mysqli_fetch_array($result)) {
        echo '<option name="ka" id = "ka" value="' . $row['Field'] . '">' . $row['Field'] . '</option>';
    }

// End the HTML dropdown menu
    echo '</select>';

// Close the database connection
    mysqli_close($db_conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/login.css">
    <?php include '../0include/navbar.php'; ?>
</head>
<body>


<div class="container">


<?php

show_all();
show_db_columns();

?>

</div>
<form action="./change.php">
<button class="button">change shit</button>
</form>
</body>



<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous">
    function printValue() {
        var select = document.getElementById("ka");
        var value = select.options[select.selectedIndex].value;
        console.log(value);
    }

</script>

</html>


