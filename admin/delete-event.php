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


// Get event data from form submission
$event_id = $_POST['id'];
$event_title = $_POST['title'];
$event_start = $_POST['start'];
$event_end = $_POST['end'];

// Delete event in database
$sql = "DELETE FROM upcoming_events WHERE id = $event_id";
if ($conn->query($sql) === TRUE) {
  echo "Event updated successfully";
} else {
  echo "Error updating event: " . $conn->error;
}

$conn->close();
?>
