<?php
// Updated book.php for ticket booking
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id']; // Add session or authentication logic
    $route_id = $_POST['route_id'];
    $start_station = $_POST['start_station'];
    $end_station = $_POST['end_station'];
    $payment_method = $_POST['payment_method'];

    // Fetch fare for the selected route
    $query = "SELECT fare FROM routes WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $route_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fare = $row['fare'];

        // Insert ticket booking
        $insert_query = "INSERT INTO tickets (route_id, user_id, start_station, end_station, fare, status, payment_method, payment_status) 
                         VALUES (?, ?, ?, ?, ?, 'booked', ?, 'pending')";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param('iissds', $route_id, $user_id, $start_station, $end_station, $fare, $payment_method);

        if ($insert_stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Ticket booked successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Booking failed."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid route selected."]);
    }
}
?>
