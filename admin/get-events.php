<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "judging";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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
