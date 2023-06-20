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
                echo "<td class='pic_td'>
                          <img class='img img-fluid product_pic' src='".  $row["pfad"] . "'>
                          </td>";
                echo "<td>
                          <div> $row[beschreibung] </div>
                          </td>";
                echo "<td>
                          <div> $row[stock] </div>
                          </td>";


            echo "</tr>";

        echo "<form id='myform' class='asdf'>";

        echo "<tr class='my_tr text-center'>";


                echo '<td>
                          <input name="id" class="input" value= " ' . $row["id"] .'">
                      </td> ';
        echo '  <td>
                          <input name="name" class="input_mail" value= " ' . $row["name"] .'">
                      </td> ';
        echo '  <td>
                          <input name="preis" class="input" value= " ' . $row["preis"] .'">
                      </td> ';
        echo '  <td>
                          <input name="pfad" type="file" class=" input input_pfad" value= " ' . $row["pfad"] .'">
                      </td> ';
        echo ' <td>
                          <input name="beschreibung" class="input" value= " ' . $row["beschreibung"] .'">
                      </td> ';
        echo ' <td>
                          <input name="stock" class="input" value= " ' . $row["stock"] .'">
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

        var form = button.parentNode.parentNode.previousSibling;
        var tr = form.nextSibling;
        var id = tr.querySelector('input[name="id"]').value;
        var name = tr.querySelector('input[name="name"]').value;
        var preis = tr.querySelector('input[name="preis"]').value;
        var pfad = tr.querySelector('input[name="pfad"]').files[0];
        var fileName = pfad ? pfad.name : null;
        var beschreibung = tr.querySelector('input[name="beschreibung"]').value;
        var stock = tr.querySelector('input[name="stock"]').value;


        var xhttp = new XMLHttpRequest();
        var url= "change_product_db.php"
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        if (fileName != null){
            xhttp.send(
                "id=" + id +
                "&name=" + name +
                "&preis=" + preis +
                "&pfad=" + fileName +
                "&beschreibung=" + beschreibung +
                "&stock=" + stock
            );
        }else{
            xhttp.send(
                "id=" + id +
                "&name=" + name +
                "&preis=" + preis +
                "&beschreibung=" + beschreibung +
                "&stock=" + stock
            );
        }

        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                showPopup('', 'Erfolgreich geändert!');

            }
        };


    }
</script>