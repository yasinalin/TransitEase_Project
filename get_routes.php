<?php
include 'db_connect.php';

$query = "SELECT id, route_name, type FROM routes";
$result = $conn->query($query);

$routes = [];
while ($row = $result->fetch_assoc()) {
    $routes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($routes);
?>
