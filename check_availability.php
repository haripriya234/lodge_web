<?php
// Establish a database connection (You'll need to provide your own database credentials)
$connection = mysqli_connect("localhost", "root", "", "lodge_booking");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$checkInDate = $_POST["checkInDate"];
$checkOutDate = $_POST["checkOutDate"];

// Check room availability
$query = "SELECT COUNT(id) AS availableRooms FROM rooms 
          WHERE is_available = 1 
          AND (checkout_date < '$checkInDate' OR checkin_date > '$checkOutDate')";

$result = mysqli_query($connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $response = ["availableRooms" => $row["availableRooms"]];
    echo json_encode($response);
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>

