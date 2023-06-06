<?php
include "../0include/dbaccess.php";// Step 1: Retrieve the "bestellungen" records with person_fk = 1
$sql_bestellungen = "SELECT * FROM `bestellungen` WHERE `person_fk` = 47";
$result_bestellungen = mysqli_query($db_obj, $sql_bestellungen);

// Step 2: Create an HTML table to display the data
echo "<table>";
echo "<tr><th>Bestellung ID</th><th>Product Names</th></tr>";

// Step 3: Iterate over the retrieved "bestellungen" records
while ($row_bestellungen = mysqli_fetch_assoc($result_bestellungen)) {
    $bestellung_erstellen_fk = $row_bestellungen['bestellung_erstellen_fk'];

    // Step 4: Retrieve the corresponding "bestellung_erstellen" record
    $sql_bestellung_erstellen = "SELECT * FROM `bestellung_erstellen` WHERE `id` = $bestellung_erstellen_fk";
    $result_bestellung_erstellen = mysqli_query($db_obj, $sql_bestellung_erstellen);
    $row_bestellung_erstellen = mysqli_fetch_assoc($result_bestellung_erstellen);

    // Step 5: Retrieve the product names from the "produkte" table
    $productNames = array();
    for ($i = 1; $i <= 10; $i++) {
        $produkt_fk = $row_bestellung_erstellen["produkt_" . $i];

        // Check if the "produkt_fk" is null
        if ($produkt_fk === null) {
            break; // Exit the loop if null value is encountered
        }

        // Retrieve the product name from the "produkte" table
        $sql_produkte = "SELECT name FROM produkte WHERE id = $produkt_fk";
        $result_produkte = mysqli_query($db_obj, $sql_produkte);
        $row_produkte = mysqli_fetch_assoc($result_produkte);
        $productNames[] = $row_produkte['name'];

        // Clean up the resources after each iteration
        mysqli_free_result($result_produkte);
    }

    // Step 6: Generate the row with Bestellung ID and collapsible product details
    echo "<tr>";
    echo "<td><button class='collapse-btn'>$row_bestellungen[id]</button></td>";
    echo "<td class='product-details' style='display: none;'>" . implode(", ", $productNames) . "</td>";
    echo "</tr>";

    // Clean up the resources after each iteration
    mysqli_free_result($result_bestellung_erstellen);
}

// Step 7: Close the HTML table
echo "</table>";

// Clean up the resources after use
mysqli_free_result($result_bestellungen);

?>
<script>
    // Add event listeners to the collapse buttons
    const collapseBtns = document.querySelectorAll('.collapse-btn');
    collapseBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const productDetails = btn.parentNode.parentNode.querySelector('.product-details');
            productDetails.style.display = productDetails.style.display === 'none' ? 'table-cell' : 'none';
        });
    });
</script>

