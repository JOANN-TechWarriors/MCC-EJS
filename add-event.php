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

// Insert event into database
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$id = "";
$sql = "INSERT INTO upcoming_events (id,title, start_date, end_date) VALUES (null, '$title', '$start', '$end')";
$result = mysqli_query($conn, $sql);

// Close connection
mysqli_close($conn);
?>
