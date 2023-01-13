<?php
// wenn ich diesen check immer bei den buchungen habe dann muss ich nicht immer minus machen bei buchungen
$checkin = "2023-01-13";
$checkout = "2023-01-15";

$conn = mysqli_connect('localhost', 'fawzy', 'mypassword', 'regestrieren');
$query = "SELECT COUNT(*) as total FROM reservierungen WHERE (anreise_datum >= '$checkin' AND abreise_datum <= '$checkout') 
                                                OR (anreise_datum <= '$checkin' AND abreise_datum >= '$checkout') ";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$reserved = $data['total'];

$query = "SELECT anzahl FROM `zimmer` WHERE id = 1";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$rooms = $data['anzahl'];

if ($reserved < $rooms) {
    echo "Rooms are available";
} else {
    echo "Sorry, all rooms are reserved for that date range.";
}

mysqli_close($conn);
?>