<table>
    <tr>
        <th>Buchungnummer</th>
        <th>E-mail</th>
        <th>Anreise Datum</th>
        <th>Abreise Datum</th>
        <th>Zimmer Kategorie</th>
        <th>Status</th>
    </tr>
    <?php
    // Connect to the database and retrieve the data
    $conn = mysqli_connect("localhost", "fawzy", "mypassword", "regestrieren");
    $sql = "SELECT * FROM reservierungen";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<form method='post' class='my-0 py-0 mx-0 px-0'>";
            echo "<h6 class='hidden'>" . $row["id"] . "</h6>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["usermail"] . "</td>";
            echo "<td>" . $row["anreise_datum"] . "</td>";
            echo "<td>" . $row["abreise_datum"] . "</td>";
            echo "<td>" . $row["room_type"] . "</td>";
            echo "<td>";
            echo "<button type='button' class='button_2 py-2 my-3' onclick='cancelReservation(this)'>Stornieren!</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    }
    mysqli_close($conn);
    ?>
</table>

<script>
    function cancelReservation(button) {
        // Get the form element containing the cancel button
        var form = button.parentNode.parentNode.firstChild;
        window.alert(form.nodeName);
        // Get the reservation ID from the form
        var id = form.firstElementChild.textContent;
        window.alert(id);
        // Send an HTTP request to the server to cancel the reservation
        var xhttp = new XMLHttpRequest();
        var url = "cancel_reservation.php";
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id=" + id);
        // Update the table to reflect the cancelled reservation
        form.parentNode.parentNode.removeChild(form.parentNode);
    }
</script>
