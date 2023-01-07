<?php

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
            color: red;
            text-align: center;
            margin-bottom: 50px;
            margin-top: 50px;

        }

    </style>
</head>


<body>


<?php



$error = "";
$success ="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $error = "First name is required!";

    }

    if (empty($_POST["lname"])) {
        $error = "Last name is required!";
    }
    elseif ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error = "Valid E-mail is required!";
    }

    elseif (strlen($_POST["password"]) < 8) {
        $error = "Password must be at least 8 characters!";

    }

    elseif ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        $error = "Password must contain at least one letter!";


    }

    elseif ( ! preg_match("/[0-9]/", $_POST["password"])) {
        $error = "Password must contain at least one number!";

    }

    elseif ($_POST["password"] !== $_POST["password_2"]) {
        $error = "Passwords must match!";
    }
    else{
        include "./new_reg_success.php";
        die();
        /*        header("location: new_reg_success.php");*/
/*            header("refresh:3;url=new_reg_success.php");*/
    }


}










?>

<form action="" method="POST" >

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
        <label for="password_2" class="label_reg">Password</label>
        <input type="password" name="password_2" placeholder="confirm password" id="password_2" class="input" required>
    </div>

    <div>
        <label for="birthdate" class="label_reg">Birthdate</label>
        <input type="date" name="birthdate" placeholder="Birthdate" id="birthdate" class="input" required>
    </div>

    <div>
        <label for="telefonnnummer" class="label_reg">telefonnnummer</label>
        <input type="tel" id="telefonnnummer" name="telefonnnummer" class="input" placeholder="+43 676 000000" required>
    </div>


    <br>
    <input type="checkbox" name="Datenschutz" id="Datenschutz" class="mx-1" required>
    <label for="Datenschutz" class="mx-3">Ich stimme den folgenden Bedingungen zu: Vienna-Palace-Hotel-Nutzungsvertrag: </label>
    <br>
    <input type="checkbox" name="Newsletter" id="Newsletter" class="mx-1">
    <label for="Newsletter" class="mx-3">Ich möchte regelmäßig Benachrichtigungen in der Form eines Newsletters erhalten.
    </label>

    <h5><strong class="mx-0">Einwilligung:</strong></h5>
    <h6 class="mx-4">Ich willige ein, per E-Mail personalisierte Angebote und Services zu erhalten. Dazu darf Vienna Palace GmbH
        meine Kundendaten sowie mein bisheriges und künftiges Kauf- und Klickverhalten auswerten.
        Die Abbestellung des Newsletters und ein Widerruf der Einwilligung in die Personalisierung sind jederzeit
        möglich über den Link in jedem Newsletter oder per E-Mail an datenschutzanfrage@Viennapalace.at. Teilnahme
        ab 18 Jahren. Mehr zu Datenschutz <a href="../0fusszeile/01datenschutz.php">hier</a></h6>




    <input type="submit" name="Submit" id="submitButton" value="Konto erstellen" class="button mx-3" formaction="">
</form>


<div class="my-5">
    <hr>
    <h3>Kontaktdaten:</h3>
    Telefonnummer: +436767029823 <br>
    E-mail: <a href="mailto: info@Viennapalace.at">info@viennapalace.at</a>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>