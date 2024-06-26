<?php
include_once "./login_proccess.php";
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
    <?php include '../0include/navbar.php'; ?>

    <link rel="stylesheet" href="../0design/login.css">

    <style>
        .ka{
            text-align: center;
            width: 200px;
            margin-top: 0;
            margin-left: 50%;
            transform: translate(-50%,-50%);
        }


    </style>


</head>
<body>

    <div class="container">
        <form method="post" class="container">
            <!--falls es einen fehler gab, dann wird $error ausgegeben-->
            <h5 class="login_error"><?php echo $error; ?></h5>

            <label for="email" class="label_mail">E-mail</label>
            <input type="email" name="email" placeholder="email" id="email" class="input_mail" required>

            <label for="password" class="label_pw">Password</label>
            <input type="password" name="password" placeholder="password" id="password" class="input_pw" required>

            <div class="container ka">
            Sie haben noch kein Konto? Hier <a href="../2_übung/new_reg.php">registrieren</a>!
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
