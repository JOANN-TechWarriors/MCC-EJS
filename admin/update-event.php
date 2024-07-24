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
$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

// Check for overlapping events excluding the current event
$query = "SELECT COUNT(*) as count FROM upcoming_events WHERE id != ? AND 
          (start_date < ? AND end_date > ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'iss', $id, $end, $start);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $count);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if ($count > 0) {
    echo json_encode(['status' => 'error', 'message' => 'An event is already scheduled during this time.']);
} else {
    // Update the event if no conflict
    $sql = "UPDATE upcoming_events SET title = ?, start_date = ?, end_date = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssi', $title, $start, $end, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update event.']);
    }
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($conn);
?>
