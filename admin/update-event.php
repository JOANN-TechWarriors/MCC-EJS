<?php
<<<<<<< HEAD
// Database connection
include 'dbcon.php';
=======
// Connect to database
$host = '127.0.0.1';
$username = 'u510162695_judging_root';
$password = '1Judging_root';  // Replace with the actual password
$dbname = 'u510162695_judging';

$conn = mysqli_connect($host, $username, $password, $dbname);
>>>>>>> b77b374fd7ac336d8cec2548774a60ff6476fedd

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['eventID'];
    $title = $_POST['eventTitle'];
    $start_date = $_POST['eventStart'];
    $end_date = $_POST['eventEnd'];

    // Check for date and time conflicts, excluding the current event
    $checkSQL = "SELECT * FROM upcoming_events WHERE id != :id AND 
                (:start_date BETWEEN start_date AND end_date 
                OR :end_date BETWEEN start_date AND end_date 
                OR (start_date BETWEEN :start_date AND :end_date) 
                OR (end_date BETWEEN :start_date AND :end_date))";
    $checkStmt = $conn->prepare($checkSQL);
    $checkStmt->bindParam(':id', $id);
    $checkStmt->bindParam(':start_date', $start_date);
    $checkStmt->bindParam(':end_date', $end_date);
    $checkStmt->execute();
    $conflict = $checkStmt->fetch();

    if ($conflict) {
        $error = "An event with the same date and time already exists.";
    } else {
        // Handle file upload
        $banner = "";
        if (isset($_FILES['eventBanner']) && $_FILES['eventBanner']['error'] == 0) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["eventBanner"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is an actual image or fake image
            $check = getimagesize($_FILES["eventBanner"]["tmp_name"]);
            if ($check !== false) {
                if ($_FILES["eventBanner"]["size"] <= 500000 &&
                    ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif")) {
                    if (move_uploaded_file($_FILES["eventBanner"]["tmp_name"], $target_file)) {
                        $banner = $target_file;
                    } else {
                        $error = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $error = "Invalid file type or file is too large.";
                }
            } else {
                $error = "File is not an image.";
            }
        }

        if (!isset($error)) {
            // Prepare SQL statement
            $sql = "UPDATE upcoming_events SET title=:title, start_date=:start_date, end_date=:end_date";
            $params = [
                ':title' => $title,
                ':start_date' => $start_date,
                ':end_date' => $end_date
            ];

            if (!empty($banner)) {
                $sql .= ", banner=:banner";
                $params[':banner'] = $banner;
            }

            $sql .= " WHERE id=:id";
            $params[':id'] = $id;

            try {
                $stmt = $conn->prepare($sql);

                // Execute the statement
                if ($stmt->execute($params)) {
                    $success = "Event updated successfully";
                } else {
                    $error = "Error updating event";
                }
            } catch(PDOException $e) {
                $error = "Error updating event: " . $e->getMessage();
            }
        }
    }
}
<<<<<<< HEAD
=======

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
>>>>>>> b77b374fd7ac336d8cec2548774a60ff6476fedd
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
    <?php
    if (isset($success)) {
        echo "Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '$success',
            confirmButtonText: 'OK'
        }).then((result) => {
            window.location.href = 'upcoming_events.php';
        });";
    } elseif (isset($error)) {
        echo "Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '$error',
            confirmButtonText: 'OK'
        }).then((result) => {
            window.location.href = 'upcoming_events.php';
        });";
    }
    ?>
    </script>
</body>
</html>
