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
$bannerImage = '';

// Handle file upload
if (isset($_FILES['eventBanner']) && $_FILES['eventBanner']['error'] == 0) {
    $targetDir = "uploads/"; // Directory to save uploaded images
    $targetFile = $targetDir . basename($_FILES["eventBanner"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["eventBanner"]["size"] > 5000000) {
        echo json_encode(['status' => 'error', 'message' => 'Sorry, your file is too large.']);
        exit();
    }

    // Allow certain file formats
    $allowedTypes = ['jpg', 'png', 'jpeg', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo json_encode(['status' => 'error', 'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.']);
        exit();
    }

    // Check if file already exists and move the file to the target directory
    if (move_uploaded_file($_FILES["eventBanner"]["tmp_name"], $targetFile)) {
        $bannerImage = $targetFile;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Sorry, there was an error uploading your file.']);
        exit();
    }
}

// Check for overlapping events
$query = "SELECT COUNT(*) as count FROM upcoming_events WHERE (start_date < '$end' AND end_date > '$start')";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row['count'] > 0) {
    echo json_encode(['status' => 'error', 'message' => 'An event is already scheduled during this time.']);
} else {
    // Insert the new event if no conflict
    $sql = "INSERT INTO upcoming_events (id, title, start_date, end_date, banner_image) VALUES (null, '$title', '$start', '$end', '$bannerImage')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add event.']);
    }
}

// Close connection
mysqli_close($conn);
?>
