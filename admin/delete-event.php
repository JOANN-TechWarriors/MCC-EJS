<?php
$host = '127.0.0.1';
$username = 'u510162695_judging_root';
$password = '1Judging_root';  // Replace with the actual password
$dbname = 'u510162695_judging';


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
            window.location = 'home.php.php'; // Redirect to another page if needed
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
