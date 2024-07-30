<?php
$host = '127.0.0.1';
$username = 'u510162695_judging_root';
$password = '1Judging_root';  // Replace with the actual password
$dbname = 'u510162695_judging';


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve events from database
$sql = "SELECT * FROM upcoming_events";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error retrieving events: " . mysqli_error($conn));
}

// Format events for FullCalendar
$events = array();
while ($row = mysqli_fetch_assoc($result)) {
    $event = array();
    $event['id'] = $row['id'];
    $event['title'] = $row['title'];
    $event['start'] = $row['start_date'];
    $event['end'] = $row['end_date'];
    array_push($events, $event);
}

// Return events as JSON
echo json_encode($events);

// Close connection
mysqli_close($conn);
?>
