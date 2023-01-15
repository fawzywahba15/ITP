<?php
if (!isset($_SESSION)){
    session_start();
}
function strip($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = strip($_POST["fname"]);
    $lname = strip($_POST["lname"]);
    $email = strip($_POST["email"]);
    $bday = strip($_POST["birthdate"]);
    $password = $_POST["password"];
    $password_2 = $_POST["password_2"];


}


//session lieber nur beim login starten
/*if (!isset($_SESSION["username"])){
    $_SESSION["username"] = "$lname";
}*/
if (!isset($_COOKIE["name_cookie"])){
    $_COOKIE["name_cookie"] ="$lname";

}else{
    setcookie("name_cookie", $lname, time() + 600);
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
    <link rel="stylesheet" href="../0design/login.css">

</head>
<body>


<?php



$error = "";
$success ="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["fname"])) {
        include '../0include/navbar.php';
        die("First name is required! <br> <a href='./registrierformular.php'>Erneut regestrieren!</a>");
    }

    if (empty($_POST["lname"])) {
        include '../0include/navbar.php';
        die("Last name is required! <br> <a href='./registrierformular.php'>Erneut regestrieren!</a>");
    }
    elseif ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        include '../0include/navbar.php';
        die("Valid E-mail is required! <br> <a href='./registrierformular.php'>Erneut regestrieren!</a>");
    }

    elseif (strlen($_POST["password"]) < 8) {
        include '../0include/navbar.php';
        die("Password must be at least 8 characters! <br> <a href='./registrierformular.php'>Erneut regestrieren!</a>");
    }

    elseif ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        include '../0include/navbar.php';
        die("Password must contain at least one letter! <br> <a href='./registrierformular.php'>Erneut regestrieren!</a>");
    }

    elseif ( ! preg_match("/[0-9]/", $_POST["password"])) {
        include '../0include/navbar.php';
        die("Password must contain at least one number! <br> <a href='./registrierformular.php'>Erneut regestrieren!</a>");
    }

    elseif ($_POST["password"] !== $_POST["password_2"]) {
        include '../0include/navbar.php';
        die("Passwords must match! <br> <a href='./registrierformular.php'>Erneut regestrieren!</a>");
    }
    else{
/*        header("Location: http://localhost:63342/registrierformular.php/2_%C3%BCbung/reg_success.php");*/
        include './reg_success.php';
    }
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

}





?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>