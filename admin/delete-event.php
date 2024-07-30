<?php
$host = '127.0.0.1';
$username = 'u510162695_judging_root';
$password = '1Judging_root';  // Replace with the actual password
$dbname = 'u510162695_judging';

// Create a new mysqli instance
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get event data from form submission
$event_id = $_POST['main_event_id'];

// Prepare and execute the delete statement
$stmt = $conn->prepare("DELETE FROM upcoming_events WHERE id = ?");
$stmt->bind_param("i", $event_id);

if ($stmt->execute()) {
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

// Close the statement and connection
$stmt->close();
$conn->close();
?>
