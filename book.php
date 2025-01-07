<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "transit_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$transit_type = $_POST['transit_type'];
$start_stop = $_POST['start_stop'];
$end_stop = $_POST['end_stop'];

// Insert data into database
$sql = "INSERT INTO bookings (transit_type, start_stop, end_stop) VALUES ('$transit_type', '$start_stop', '$end_stop')";

if ($conn->query($sql) === TRUE) {
    echo "Ticket booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
