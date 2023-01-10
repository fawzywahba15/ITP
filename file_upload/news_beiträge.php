<?php
if(!isset($_SESSION)) {
    session_start();
}

function get_all_news()
{

    $host = "localhost";
    $user = "fawzy";
    $password = "mypassword";
    $dbname = "regestrieren";

    $conn = mysqli_connect($host, $user, $password, $dbname);


// Select the articles from the database
    $sql = "SELECT * FROM `news_beiträge` ORDER BY timestamp DESC";
    $result = mysqli_query($conn, $sql);

// Display the articles
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<article>';
            echo '<p class="time_stamp">' . $row['timestamp'] . '</p>';

            echo '<h2>' . $row['title'] . '</h2>';
            echo '<div class="text_zentriert">';
            echo  ' <img
                class="img-fluid"
                src=" ' . $row["file_path"] . ' " 
                alt="News Bild"
                width="800" height="500"></div>';

            echo '<p>' . $row['text'] . '</p>';

            echo "<hr>";
            echo '</article>';
        }
    } else {
        echo "No articles found.";
    }

// Close the connection
    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link rel="stylesheet" href="../0design/my_design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
<?php include '../0include/navbar.php'; ?>
    <style>
        .time_stamp{
            color: white;
            margin-left: 90%;
        }
    </style>
</head>
<body>

<div class="container text-center">
    <?php
    get_all_news();

    ?>
</div>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
