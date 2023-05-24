<!--ist responsive-->
<?php
//session start
if(!isset($_SESSION))
{
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drop your ship</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../0design/my_design.css">
    <?php include '../0include/navbar.php';?>


</head>






<body>


<div class="container">

<h5 class="my-5">
    <?php
    //holt das SESSION SUPERGLOBAL und begrüßt den angemeldeten user mit nachnamen
    if (isset($_SESSION["username"] )) {
        echo "Welcome back " .  $_SESSION["username"]  . "!";
    }
    else{
        echo "";
    }
    ?>
</h5>



    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">

            <?php
            include "../0include/dbaccess.php";

            $sql = "SELECT * FROM produkte";
            $result = mysqli_query($db_obj, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {

                    ?>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">

                            <img src='<?php echo $row["pfad"]?>' class="card-img img-fluid" width="96" height="350" alt="">

                        </div>
                    </div>

                    <div class="card-body bg-light text-center">
                        <div class="mb-2">

                            <h6 class="font-weight-semibold mb-2">
                                <a href="#" class="text-default mb-2" data-abc="true"><?php echo $row["name"]?></a>
                            </h6>

                            <a href="#" class="text-muted" data-abc="true">Schuhe</a>
                        </div>

                        <h3 class="mb-0 font-weight-semibold text-black"><?php echo "€" . $row["preis"]?></h3>

                        <div class="text-muted mb-3">34 reviews</div>
                        <div class="text-muted mb-3">Beschreibung: <?php echo $row["beschreibung"]?></div>

                        <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>


                    </div>
                </div>
            </div>
<?php
                }
            }
?>

<!--            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">

                            <img src="../zzz/images/download_1.jpg" class="card-img img-fluid" width="96" height="350" alt="">

                        </div>
                    </div>

                    <div class="card-body bg-light text-center">
                        <div class="mb-2">

                            <h6 class="font-weight-semibold mb-2">
                                <a href="#" class="text-default mb-2" data-abc="true">Jordans</a>
                            </h6>

                            <a href="#" class="text-muted" data-abc="true">Schuhe</a>
                        </div>

                        <h3 class="mb-0 font-weight-semibold text-black">€130</h3>

                        <div class="text-muted mb-3">34 reviews</div>

                        <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>


                    </div>
                </div>
            </div>



            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">

                            <img src="../zzz/images/download_2.jpg" class="card-img img-fluid" width="96" height="350" alt="">


                        </div>
                    </div>

                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <h6 class="font-weight-semibold mb-2">
                                <a href="#" class="text-default mb-2" data-abc="true">Jordans</a>
                            </h6>

                            <a href="#" class="text-muted" data-abc="true">Schuhe</a>
                        </div>

                        <h3 class="mb-0 font-weight-semibold text-black">€130</h3>


                        <div class="text-muted mb-3">34 reviews</div>

                        <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>


                    </div>
                </div>
            </div>



            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">

                            <img src="../zzz/images/download_3.jpg" class="card-img img-fluid" width="96" height="350" alt="">


                        </div>
                    </div>

                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <h6 class="font-weight-semibold mb-2">
                                <a href="#" class="text-default mb-2" data-abc="true">Jordans</a>
                            </h6>

                            <a href="#" class="text-muted" data-abc="true">Schuhe</a>
                        </div>

                        <h3 class="mb-0 font-weight-semibold text-black">€130</h3>




                        <div class="text-muted mb-3">34 reviews</div>

                        <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>


                    </div>
                </div>
            </div>




            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">

                            <img src="../zzz/images/download_4.jpg" class="card-img img-fluid" width="96" height="350" alt="">


                        </div>
                    </div>

                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <h6 class="font-weight-semibold mb-2">
                                <a href="#" class="text-default mb-2" data-abc="true">Jordans</a>
                            </h6>

                            <a href="#" class="text-muted" data-abc="true">Schuhe</a>
                        </div>

                        <h3 class="mb-0 font-weight-semibold text-black">€130</h3>



                        <div class="text-muted mb-3">34 reviews</div>

                        <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>


                    </div>
                </div>
            </div>




            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">

                            <img src="../zzz/images/download_5.png" class="card-img img-fluid" width="96" height="350" alt="">


                        </div>
                    </div>

                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <h6 class="font-weight-semibold mb-2">
                                <a href="#" class="text-default mb-2" data-abc="true">Jordans</a>
                            </h6>

                            <a href="#" class="text-muted" data-abc="true">Schuhe</a>
                        </div>

                        <h3 class="mb-0 font-weight-semibold text-black">€130</h3>



                        <div class="text-muted mb-3">34 reviews</div>

                        <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>


                    </div>
                </div>
            </div>




            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">

                            <img src="../zzz/images/download_6.png" class="card-img img-fluid" width="96" height="350" alt="">


                        </div>
                    </div>

                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <h6 class="font-weight-semibold mb-2">
                                <a href="#" class="text-default mb-2" data-abc="true">Jordans</a>
                            </h6>

                            <a href="#" class="text-muted" data-abc="true">Schuhe</a>
                        </div>

                        <h3 class="mb-0 font-weight-semibold text-black">€130</h3>



                        <div class="text-muted mb-3">34 reviews</div>

                        <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>


                    </div>
                </div>




            </div>
        </div>
-->





    </div>






</body>
<br>
<!--todo hier einfügen-->
<?php
/*include_once "../0include/footer.php"
*/?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
         crossorigin="anonymous"></script>

</html>