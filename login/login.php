<!--bissi responsive-->
<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
//zu databaser comparen
    $db_host = 'localhost';
    $db_user = 'fawzy';
    $db_password = 'mypassword';
    $database = 'regestrieren';
    $db_obj = new mysqli($db_host, $db_user, $db_password, $database);
    $sql =
        "SELECT * FROM `login`";
    $result = $db_obj->query($sql);
    $redirect = False;
    if ($result->num_rows > 0) {
        //iteriert alle datensätz in der Datenbank
        while($row = $result->fetch_assoc()) {
            // sucht email
            if ($email == $row["usermail"] ){

                // überprüft passwort
                if (password_verify($_POST["password"], $row["password"])){
                    session_start();
                    if ($row["admin"] == 1){
                        $_SESSION["admin"] = true;
                    }else{
                        $_SESSION["admin"] = false;
                    }
                    $redirect = True;
                    include "./login_proccess.php";
                    exit();
                }else{
                    $error = "Password or Email dont match";
                }
            }else{
                $error = "Password or Email dont match";
            }
        }
    }



    $db_obj->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/login.css">
    <?php include '../0include/navbar.php'; ?>

    <style>
        .ka{
            text-align: center;
            width: 200px;
            margin-top: 0;
            margin-left: 50%;
            transform: translate(-50%,-50%);
        }
        .button{
            margin-top:;
        }
        .login_error{
            color: red;
            text-align: center;
            margin-bottom: 50px;
            margin-top: 50px;

        }
    </style>


</head>
<body>
    <!-- <h1 class="text_zentriert">Vienna Palace Hotel</h1> -->


    <div class="container">

        <form method="post" class="container"> <!--action="./login_proccess.php"-->
            <h5 class="login_error"><?php echo $error; ?></h5>

            <label for="email" class="label_mail">E-mail</label>
            <input type="email" name="email" placeholder="email" id="email" class="input_mail" required>


            <label for="password" class="label_pw">Password</label>
            <input type="password" name="password" placeholder="password" id="password" class="input_pw" required>

            <div class="container ka">
            Sie haben noch keinem Konto? Hier <a href="../2_übung/new_reg.php">registrieren</a>!
            </div>

            <input type="submit" name="Login" id="submitButton" value="Login" class="button">

        </form>
    </div>



</body>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous">

</script>

</html>
