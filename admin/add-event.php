<?php
// Connect to database
$host = '127.0.0.1';
$username = 'u510162695_judging_root';
$password = '1Judging_root';  // Replace with the actual password
$dbname = 'u510162695_judging';

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get event details from POST request
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

// Check for overlapping events
$query = "SELECT COUNT(*) as count FROM upcoming_events WHERE 
          (start_date < '$end' AND end_date > '$start')";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row['count'] > 0) {
    echo json_encode(['status' => 'error', 'message' => 'An event is already scheduled during this time.']);
} else {
    // Insert the new event if no conflict
    $sql = "INSERT INTO upcoming_events (id, title, start_date, end_date) VALUES (null, '$title', '$start', '$end')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add event.']);
    }
}

// Close connection
mysqli_close($conn);
?>
