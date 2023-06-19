<?php
//session start
if(!isset($_SESSION))
{
    session_start();
}
include_once "./admin.php";
include_once "../0include/popup.html";
?>
<style>
    .input_pfad{
        width: 130px;
    }
</style>
<body>
<table class="mx-3">
    <tr>
        <th class="th">Produkt ID</th>
        <th class="th">Name</th>
        <th class="th">Preis</th>
        <th class="th">bild</th>
        <th class="th">beschreibung</th>
        <th class="th">stock</th>
        <th class="th">Aktualisieren</th>

    </tr>
<?php
include_once "../0include/dbaccess.php";
$sql = "SELECT * FROM produkte";
$result = mysqli_query($db_obj, $sql);
if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){

         echo "<form id='myform'>";
            echo "<tr class='my_tr text-center'>";


                echo "<td>
                      <div> $row[id] </div>
                      </td>";

                echo "<td>
                          <div> $row[name] </div>
                          </td>";
                echo "<td>
                          <div> $row[preis] </div>
                          </td>";
                echo "<td>
                          <div> $row[pfad] </div>
                          </td>";
                echo "<td>
                          <div> $row[beschreibung] </div>
                          </td>";
                echo "<td>
                          <div> $row[stock] </div>
                          </td>";


            echo "</tr>";
            echo "<tr class='my_tr text-center'>";


                echo '<td>
                          <input class="input" value= " ' . $row["id"] .'">
                      </td> ';
        echo '  <td>
                          <input class="input_mail" value= " ' . $row["name"] .'">
                      </td> ';
        echo '  <td>
                          <input class="input" value= " ' . $row["preis"] .'">
                      </td> ';
        echo '  <td>
                          <input type="file" class=" input input_pfad" value= " ' . $row["pfad"] .'">
                      </td> ';
        echo ' <td>
                          <input class="input" value= " ' . $row["beschreibung"] .'">
                      </td> ';
        echo ' <td>
                          <input class="input" value= " ' . $row["stock"] .'">
                      </td> ';


            echo "<td>";
            echo "<button type='submit' class='button_2_round my-3 px-5' onclick='change_article_data(this)'>Aktualisieren!</button>";
            echo "</td>";
            echo "</tr>";
            echo "</form>";


        }
    }else {
        echo "</table>";
        echo "<div class='warnung py-3 my-3'>";
        echo "Keine Buchungen gefunden!";
        echo "</div>";
    }
    mysqli_close($db_obj);


?>
</body>
<script>
    function change_article_data(button){
        event.preventDefault();
        var form = button.parentNode.parentNode.previousSibling.previousSibling;
        var id = form.nextSibling.firstChild.textContent

        var xhttp = new XMLHttpRequest();
        var url= ".php"

        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id=" + id + "&status=" + status);
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                showPopup('', 'Erfolgreich geändert!');

            }
        };


    }
</script>