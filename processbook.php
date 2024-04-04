<!DOCTYPE html>
<html>
<head>
    <title>Booking Form Response</title>
    <style>
        /* Style the navigation bar */
        .navbar {
          overflow: hidden;
          background-color: yellowgreen; /* You can choose any color you prefer */
        }
          .madhu{
            font-size: 160%;
            float: left;
            font-style: bold;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
          }
        
        /* Style the navigation bar links */
        .navbar a {
          float:right;
          display: block;
          color: white;
          text-align: right;
          padding: 14px 16px;
          text-decoration: none;
          margin-top: 0.5%;
          font-size: 100%;
        }
        
        /* Change the color of the navigation bar links when you hover over them */
        .navbar a:hover {
          background-color: grey; /* You can choose any color you prefer */
          color: white;
        }
        .response {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
  <div class="madhu">
    <a href="#madhushini">MADHUSHINI</a>
  </div>
  <a href="contact.html">CONTACT</a>
  <a href="test.html">TESTIMONIALS</a>
  <a href="PHOTO.html">PHOTOGALLERY</a>
  <a href="amen.html">AMENITIES AND FACILITIES</a>
  <a href="acc.html">ACCOMEDATIONS</a>
  <a href="home.html">HOME</a>
</div>
<h1>Booking Form Response</h1>
<div class="response">
<?php
require_once("db_config.php"); // Include your database configuration file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $checkInDate = $_POST["check-in-date"];
    $departureDate = $_POST["departure-date"];
    $roomType = $_POST["room-type"];

    // Insert the booking data into the database
    $sql = "INSERT INTO bookings (name, email, check_in_date, departure_date, room_type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $checkInDate, $departureDate, $roomType);

    if ($stmt->execute()) {
        echo "Booking successful!"; // You can customize this message
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
</div>
</body>
</html>
