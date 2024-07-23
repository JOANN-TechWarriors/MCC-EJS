<?php
include('dbcon.php');
date_default_timezone_set('Asia/Manila');

$query = "SELECT id, title, start_event as start, end_event as end FROM events";
$result = $conn->query($query);

$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}

echo json_encode($events);

$conn->close();
?>
