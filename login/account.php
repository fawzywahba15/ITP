<?php

//daten ändern code vom anderen laptop kopieren


function get_data($output){
    $host = 'localhost';
    $user = 'fawzy';
    $password = 'mypassword';
    $database = 'regestrieren';
    $db_obj = new mysqli($host, $user, $password, $database);
    $sql = "select * from `login`";
    $result = $db_obj->query($sql);
    $current_user = $_SESSION["username"];

    if ($result->num_rows > 0) {
        //iteriert alle datensätz in der Datenbank
        while($row = $result->fetch_assoc()) {
            // sucht email
            if ($current_user == $row["username"] ){
                echo $row[$output];

            }
        }
    }
}


if(!isset($_SESSION)) {
    session_start();

}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../0design/my_design.css">

    <?php include "../0include/navbar.php";?>
    <style>
        .account_label{
            margin-top: 20px;
            color: red;
        }
        .label_value{
            display: flex;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .button{
            width: 240px;
            height: auto;

        }

        .input{
            display: block;
            margin-left: 0;
            padding: 0;
            width: 100px;
            transform: none;
            margin-bottom: 5px;
            margin-top: 4px;
            border-color: #824caf;
        }
        .input:focus{
            width: 140px;
        }
        .login_error{
            color: red;
            text-align: center;
            margin-bottom: 50px;
            margin-top: 50px;

        }
        .login_success{
            color: #2ecc71;
            text-align: center;
            margin-bottom: 50px;
            margin-top: 50px;

        }
    </style>
</head>
<body>


<div class="container my-5">

    <?php if(isset($_SESSION["username"])) : ?>
        <h5 class="login_error"><?php echo $error;?></h5>
        <h5 class="login_success"><?php echo $success;?></h5>
    <!--    Nachname ändern-->
    <div>
        <label for="show_form_nachname" class="account_label my-0">Nachname:</label>
        <p class="label_value">
            <?php
            echo $_SESSION["username"];
            ?>
        </p>
        <button onclick="showForm_nachname()" id="show_form_nachname" class="button px-5 py-1 my-1">Nachname ändern</button>
        <form id="nachname" action="change_database.php" style="display: none;" method="post" class="my-1">
            <div>
            <label for="Nachname_input" class="my-0">Neuer Nachname:</label>
            <input type="text" id="Nachname_input" name="Nachname_input" class="input">
            </div>
            <button onclick="" class="button_2 px-3 py-1">Ändern!</button>
        </form>
    </div>


<!--    Vorname ändern-->
    <div>
        <label for="vorname_value" class="account_label">Vorname:</label>
        <p class="label_value" id="vorname_value">
            <?php
            get_data("first_name");
            ?>
        </p>
        <button onclick="showForm_vorname()" id="show_form_vorname" class="button px-5 py-1 my-1">Vorname ändern</button>
            <form id="vorname"  action="change_database.php" style="display: none;" method="post" class="my-1">
                <div>
                <label for="vorname_input">Neuer Vorname:</label>
                <input type="text" id="vorname_input" name ="vorname_input" class="input my-1">
                </div>
                <button onclick="" class="button_2 px-3 py-1">Ändern!</button>
            </form>
    </div>



    <!--    Geburtstag ändern-->
    <div>
        <label for="geburtstag_value"  class="account_label">Geburtstag:</label>
        <p class="label_value" id="geburtstag_value">
            <?php
            get_data("birthday");
            ?>

        </p>
        <button onclick="showForm_geburtstag()" id="show_form_geburtstag" class="button px-5 py-1 my-1">Geburtstag ändern</button>
        <form id="geburtstag"  action="change_database.php" style="display: none;" method="post" class="my-1" action="change_database.php">
            <div>
            <label for="geburtstag_input">Neuer Geburtstag:</label>
            <input type="text" id="geburtstag_input" name="geburtstag_input" class="input my-1">
            </div>
            <button onclick="" class="button_2 px-3 py-1">Ändern!</button>
        </form>
    </div>




    <!--    mail ändern-->
    <div>
        <label for="mail_value" class="account_label">E-mail:</label>
        <p class="label_value" id="mail_value">
            <?php
            get_data("usermail");
            ?>
        </p>
        <button onclick="showForm_mail()" id="show_form_mail" class="button px-5 py-1 my-1">E-mail ändern</button>
        <form id="mail"  action="change_database.php" style="display: none;" method="post" class="my-1">
            <div>
            <label for="mail_input">Neue E-mail:</label>
            <input type="text" id="mail_input" name ="mail_input" class="input my-1">
            </div>
            <button onclick="" class="button_2 px-3 py-1">Ändern!</button>
        </form>
    </div>




    <!--    passwort ändern-->
    <div>
        <label for="passwort_value" class="account_label">Passwort:</label>
        <p class="label_value" id="passwort_value">*************
        </p>
        <button onclick="showForm_passwort()" id="show_form_passwort" class="button px-5 py-1 my-1">Passwort ändern</button>
        <form id="passwort" action="change_database.php" style="display: none;" method="post" class="my-1">
            <div>
            <label for="altes_passwort_input" >Altes Passwort:</label>
            <input type="password" id="altes_passwort_input" name="altes_passwort_input" class="input my-1 ms-6">
            </div>
            <div>
            <label for="neues_passwort_input">Neues Passwort:</label>
            <input type="password" id="neues_passwort_input" name="neues_passwort_input" class="input my-1 ms-6">
            </div>
            <div>
            <label for="neues_passwort_confirmation_input">Neues Passwort wiederholen:</label>
            <input type="password" id="neues_passwort_confirmation_input" name="neues_passwort_confirmation_input" class="input my-1">
            </div>
            <button onclick="" class="button_2 px-3 py-1 my-2">Ändern!</button>

        </form>
    </div>
    <?php else: ?>
    <div><h3>Sie sind abgemeldet. Bitte <a href="../login/login.php">anmelden</a>!</h3></div>
    <?php endif; ?>

</div>




<script type="text/javascript">
    function showForm_vorname() {
        document.getElementById('vorname').style.display = 'block';
    }
    function showForm_nachname() {
        document.getElementById('nachname').style.display = 'block';
    }
    function showForm_geburtstag() {
        document.getElementById('geburtstag').style.display = 'block';
    }
    function showForm_passwort() {
        document.getElementById('passwort').style.display = 'block';
    }
    function showForm_mail() {
        document.getElementById('mail').style.display = 'block';
    }
</script>


</body>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous">

</script>
</html>
