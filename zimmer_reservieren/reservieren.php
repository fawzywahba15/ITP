<?php
// get the form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$arrival_date = $_POST['arrival_date'];
$departure_date = $_POST['departure_date'];
$room_type = $_POST['room_type'];

// validate the form data
if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($arrival_date) || empty($departure_date) || empty($room_type)) {
    echo "Error: All fields are required.";
    exit;
}

// connect to the database
$host = "localhost";
$user = "username";
$password = "password";
$dbname = "database_name";
$conn = mysqli_connect($host, $user, $password, $dbname);

// check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
