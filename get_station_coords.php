<?php
include 'db_connect.php';

$source = $_GET['source'];
$destination = $_GET['destination'];

$query = "SELECT name, latitude, longitude FROM stations WHERE name IN (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $source, $destination);
$stmt->execute();

$result = $stmt->get_result();
$stations = [];
while ($row = $result->fetch_assoc()) {
    $stations[$row['name']] = ['lat' => $row['latitude'], 'lng' => $row['longitude']];
}

header('Content-Type: application/json');
echo json_encode($stations);
?>
