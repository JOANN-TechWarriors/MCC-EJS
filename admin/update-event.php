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

// Check for overlapping events excluding the current event
$query = "SELECT COUNT(*) as count FROM upcoming_events WHERE id != ? AND (start_date < ? AND end_date > ?)";
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
    if ($bannerImage) {
        // Include banner image update if a new image was uploaded
        $sql = "UPDATE upcoming_events SET title = ?, start_date = ?, end_date = ?, banner_image = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssi', $title, $start, $end, $bannerImage, $id);
    } else {
        // Exclude banner image update if no new image was uploaded
        $sql = "UPDATE upcoming_events SET title = ?, start_date = ?, end_date = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssi', $title, $start, $end, $id);
    }

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
