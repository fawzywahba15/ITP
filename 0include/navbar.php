
<link rel="stylesheet" href="../0design/my_design.css">


<style>
    .navbar-nav .nav-item .nav-link {
        color: #4CAF50;
    }
    .navbar-nav .nav-item.active .nav-link,
    .navbar-nav .nav-item:hover .nav-link {
        color: #824caf ;
    }


/*    wenn ein button gedrückt wird*/
/*    .navbar-nav .nav-item.active .nav-link,
    .navbar-nav .nav-item:active .nav-link {
        border: 1px #4CAF50 solid;
    }*/


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


    .navbar{
        margin-bottom: 30px;
    }
</style>


<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid " >
        <a class="navbar-brand"  href="../1.übung/main.php">Vienna Palace Hotel</a> <!--hotel name in grün-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown" >
            <ul class="navbar-nav">


                <li class="nav-item" >
                    <a class="nav-link active" aria-current="page"  href="../zimmer_reservieren/zimmer_main.php">Zimmer reservieren</a>
                </li>

                <li class="nav-item" >
                    <a class="nav-link active" aria-current="page"  href="../2_übung/new_reg.php">reg formular</a>
                </li>



                <li class="nav-item">
                    <a class="nav-link " href="../login/account.php">Konto</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"  href="../0fusszeile/02faq.php">faq</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link"  href="../file_upload/upload.php">file upload</a>
                </li>

<!--                <li class="nav-item">
                    <a class="nav-link " href="../0fusszeile/01datenschutz.php">Datenschutz</a>
                </li>-->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Weiterführende Links
                    </a>
                    <ul class="dropdown-menu">
<!--                        <li><a class="dropdown-item" href="../login/account.php">Konto</a></li>-->
                        <li><a class="dropdown-item" href="../0fusszeile/01datenschutz.php">datenschutz</a></li>
                        <li ><a class="dropdown-item" href="../0fusszeile/00impressum.php">impressum</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <?php if (!isset($_SESSION["username"] )) : ?>
                <form action='../login/login.php' >
              <button class='navbar_login'>anmelden</button>
                  </form>
        <?php else: ?>

                <form action='../login/logout.php' >
                <button class='navbar_login'>abmelden</button>
                </form>
        <?php endif; ?>
    </div>

</nav>
