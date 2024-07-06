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

// Update event in database
$sql = "UPDATE upcoming_events SET title='$event_title', start_date='$event_start', end_date='$event_end' WHERE id=$event_id";
if ($conn->query($sql) === TRUE) {
  echo "Event updated successfully";
} else {
  echo "Error updating event: " . $conn->error;
}

$conn->close();
?>
