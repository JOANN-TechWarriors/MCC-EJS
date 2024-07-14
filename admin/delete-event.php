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
