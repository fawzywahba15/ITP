
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../0design/my_design.css">
    <style>
        .navbar-nav .nav-item .nav-link {
            color: #4CAF50;
        }
        .navbar-nav .nav-item.active .nav-link,
        .navbar-nav .nav-item:hover .nav-link {
            color: #824caf ;
        }
        .container-fluid .navbar-brand{
            color: #4CAF50;
        }

        .container-fluid .navbar-brand:hover{
            color: #824caf;
        }
        .dropdown-menu{

            background: #824caf;
        }

        .dropdown-menu .dropdown-item{
            color: white;
        }
        .dropdown-item:hover{
            background: #4CAF50;
        }


        /*----------------------------margin----------------------------------*/
        .navbar{
            margin-bottom: 30px;
        }



        /*        hier muss man noch a href farben ändern*/
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid " >
        <a class="navbar-brand"  href="../index/main.php">Vienna Palace Hotel</a> <!--hotel name in grün-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown" >
            <ul class="navbar-nav">
                <li class="nav-item" >
                    <a class="nav-link active" aria-current="page"  href="../2_übung/registrierformular.php">reg formular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="../0fusszeile/02faq.php">faq</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../0fusszeile/00impressum.php">impressum</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Weiterführende Links
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../login/account.php">Konto</a></li>
                        <li><a class="dropdown-item" href="../0fusszeile/01datenschutz.php">datenschutz</a></li>
                        <li><a class="dropdown-item" href="#">kommt noch</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php
        if (!isset($_SESSION["username"] )) {
            echo "<form action='../login/login.php' >
                      <button class='navbar_login'>anmelden</button>
                      </form>";
        }else{
            echo
            "<form action='../login/logout.php' >
                <button class='navbar_login'>logout</button>
            </form>";
        }

        ?>
        <!--      <form action="../login/login.php" >
                  <button class="navbar_login">anmelden</button>
              </form>-->
    </div>

</nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</html>