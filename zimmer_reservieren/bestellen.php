<?php
include "zimmer_main.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sale</title>
    <style>
        .check {

            appearance: none;
            width: 20px;
            height: 20px;
            background-color: #eee;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            box-shadow: 0 1px 2px #2ecc71;
        }
        .check:checked{
            background-color: #2ecc71;
            border: 1px solid #27ae60;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), 0 0 0 15px rgba(46, 204, 113, 0.1);
        }
        .checkbox-label {
            /* style the label for the checkbox */
            font-size: 16px;
            font-weight: bold;
            margin-left: 5px;
        }

        .ich{
            text-align: center;
        }
        .input{
            margin-top: 0;;
            margin-bottom: 0;
        }
        .label_reg{
            margin-top: 0;
        }
        .res_error{
            color: red;
            text-align: center;
            margin-bottom: 50px;
            margin-top: 50px;
        }
        .res_success{
            color: #2ecc71;
            text-align: center;
            margin-bottom: 50px;
            margin-top: 50px;
        }
        .button_2{
            margin-left: 50%;
            transform: translate(-50%,+50%);
            margin-bottom: 100px;
        }
    </style>
</head>
<body>

<?php

$preis = 100;



$error = "";
$success ="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*    include_once "checkout.php";*/
}
?>



<form action="./checkout.php" method="post">
    <h5 class="res_error"><?php echo $error; ?></h5>
    <h5 class="res_success"><?php echo $success;?></h5>
    <label for="first_name" class="label_reg">First Name:</label><br>
    <input type="text" class="input" id="first_name" name="first_name"><br>

    <label for="last_name" class="label_reg">Last Name:</label><br>
    <input type="text" class="input" id="last_name" name="last_name"><br>

    <label for="email"  class="label_reg">Email:</label><br>
    <input type="email" class="input" id="email" name="email" value="<?php echo $_SESSION["email"]?>" ><br>


    <label for="arrival_date" class="label_reg">Arrival Date:</label><br>
    <input type="date" class="input py-2" id="arrival_date"  min="<?= date('Y-m-d'); ?>" value="<?= date('Y-m-d'); ?>" name="arrival_date"><br>

    <label for="departure_date" class="label_reg">Departure Date:</label><br>
    <input type="date" class="input py-2" id="departure_date" min="<?= date('Y-m-d', strtotime(' +1 day')); ?>" name="departure_date"><br>

    <label for="room_type" class="label_reg">Room Type:</label><br>
    <select class="input" id="room_type" name="room_type">
        <option value="single room">Single Bedroom</option>
        <option value="double room">Double Bedroom</option>
        <option value="suite">Suite</option>
    </select><br>

    <input type="submit" class="button_2" value="Reserve Room">
</form>



</body>

<?php
include_once "../0include/footer.php"
?>

</html>