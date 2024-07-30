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

// Delete event in database
$sql = "DELETE FROM upcoming_events WHERE id = $event_id";
if ($conn->query($sql) === TRUE) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Event deleted successfully',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location = 'your_redirect_page.php'; // Redirect to another page if needed
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error deleting event',
            text: '" . $conn->error . "',
        });
    </script>";
}

$conn->close();
?>
