<?php
//startet session
if (!isset($_SESSION)){
    session_start();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrierformular</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php'; ?>
    <style>
        .login_error{
            margin-bottom: 20px;
        }
    </style>
</head>


<body>


<?php

// erstelle variablen um später auszugeben
$error = "";
$success ="";


//error handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    //verbindet mit der datenbank und überprüft ob die email schon existiert

    $email = strtolower($_POST["email"]);
    $password = $_POST["password"];

//db conn
    include_once "../0include/dbaccess.php";
    $sql = "SELECT * FROM `login`";
    $result = $db_obj->query($sql);

    if ($result->num_rows > 0) {
        //iteriert alle datensätz in der Datenbank
        while($row = $result->fetch_assoc()) {
            // sucht eingegebene mail
            if ($email == $row["usermail"] ){
                $mail_already_exist = True;
            }
        }
    }


    if (empty($_POST["fname"])) {
        $error = "First name is required!";

    }

    if (empty($_POST["lname"])) {
        $error = "Last name is required!";
    }
    elseif ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error = "Valid E-mail is required!";
    }
    // pw mind. 8 zeichen
    elseif (strlen($_POST["password"]) < 8) {
        $error = "Password must be at least 8 characters!";

    }
    // mindestens einen buchstaben
    elseif ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        $error = "Password must contain at least one letter!";


    }
    // mindestens eine zahl
    elseif ( ! preg_match("/[0-9]/", $_POST["password"])) {
        $error = "Password must contain at least one number!";

    }

    elseif ($_POST["password"] !== $_POST["password_2"]) {
        $error = "Passwords must match!";
    }
    elseif (isset($mail_already_exist)){
        $error = "Email already exists!";
    }
    else{
        // wenn reg erfolgreich ist dann zeigt es die success seite
        include "./new_reg_success.php";
        die();
    }


}


?>

<form action="" method="POST" >
<!--    error oder success ausgeben-->
    <h5 class="login_error"><?php echo $error; ?></h5>
    <div>
        <label for="anrede" class="label_reg">Anrede</label> <br>
        <select name="anrede" id="anrede" class="input" required>
            <option value="Herr">Herr</option>
            <option value="Frau">Frau</option>
        </select>
    </div>

    <div>
        <label for="fname" class="label_reg">First name</label>
        <input type="text" id="fname" name="fname" placeholder="Max" class="input" required>
    </div>

    <div>
        <label for="lname" class="label_reg">Last name</label> <!-- label is text -->
        <input type="text" id="lname" name="lname" placeholder="Mustermann" class="input" required>
    </div>

    <div >
        <label for="email" class="label_reg">E-mail</label>
        <input type="email" name="email" placeholder="email" id="email" class="input" required>
    </div>

    <div>
        <label for="password" class="label_reg">Password</label>
        <input type="password" name="password" placeholder="password" id="password" class="input"  required>
    </div>

    <div>
        <label for="password_2" class="label_reg">Repeat Password</label>
        <input type="password" name="password_2" placeholder="confirm password" id="password_2" class="input" required>
    </div>

    <div>
        <label for="birthdate" class="label_reg">Birthdate</label>
        <input type="date" name="birthdate" placeholder="Birthdate" id="birthdate" class="input" required>
    </div>



    <br>
    <div class="mx-3">
        <input type="checkbox" name="Datenschutz" id="Datenschutz" class="mx-1" required>
        <label for="Datenschutz" class="mx-3">Ich stimme den folgenden Bedingungen zu: Vienna-Palace-Hotel-Nutzungsvertrag: </label>
        <br>
        <input type="checkbox" name="Newsletter" id="Newsletter" class="mx-1">
        <label for="Newsletter" class="mx-3">Ich möchte regelmäßig Benachrichtigungen in der Form eines Newsletters erhalten.</label>

    </div>

    <h5><strong class="mx-3">Einwilligung:</strong></h5>
    <h6 class="mx-4">Ich willige ein, per E-Mail personalisierte Angebote und Services zu erhalten. Dazu darf Vienna Palace GmbH
        meine Kundendaten sowie mein bisheriges und künftiges Kauf- und Klickverhalten auswerten.
        Die Abbestellung des Newsletters und ein Widerruf der Einwilligung in die Personalisierung sind jederzeit
        möglich über den Link in jedem Newsletter oder per E-Mail an datenschutzanfrage@Viennapalace.at. Teilnahme
        ab 18 Jahren. Mehr zu Datenschutz <a href="../0fusszeile/01datenschutz.php">hier</a></h6>


    <input type="submit" name="Submit" id="submitButton" value="Konto erstellen" class="button mx-3" formaction="">
</form>



</body>


<?php
include_once "../0include/footer.php"
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>