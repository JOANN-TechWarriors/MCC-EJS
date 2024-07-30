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

// Handle file upload
$banner = "";
if(isset($_FILES['banner']) && $_FILES['banner']['error'] == 0) {
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $filename = $_FILES["banner"]["name"];
    $filetype = $_FILES["banner"]["type"];
    $filesize = $_FILES["banner"]["size"];

    // Verify file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

    // Verify file size - 5MB maximum
    $maxsize = 5 * 1024 * 1024;
    if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

    // Verify MYME type of the file
    if(in_array($filetype, $allowed)) {
        // Check whether file exists before uploading it
        if(file_exists("uploads/" . $filename)) {
            echo $filename . " is already exists.";
        } else {
            if(move_uploaded_file($_FILES["banner"]["tmp_name"], "uploads/" . $filename)) {
                $banner = "uploads/" . $filename;
            } else {
                echo "File is not uploaded";
            }
        }
    } else {
        echo "Error: There was a problem uploading your file. Please try again."; 
    }
}

// Insert event into database
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$sql = "INSERT INTO upcoming_events (id, title, start_date, end_date, banner) VALUES (null, '$title', '$start', '$end', '$banner')";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "Event added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

<<<<<<< HEAD
=======
// Close connection
mysqli_close($conn);
?><?php
// Connect to database
$host = '127.0.0.1';
$username = 'u510162695_judging_root';
$password = '1Judging_root';
$dbname = 'u510162695_judging';

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get event details from POST request
$title = $_POST['main_event'];
$start = $_POST['date_start'];
$end = $_POST['date_end'];
$event_time = $_POST['event_time'];
$place = $_POST['place'];
$bannerImage = '';

// Handle file upload
if (isset($_FILES['eventBanner']) && $_FILES['eventBanner']['error'] == 0) {
    $targetDir = "../img/"; // Directory to save uploaded images
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
    $sql = "INSERT INTO upcoming_events (id, title, start_date, end_date, event_time, place, banner_image) VALUES (null, '$title', '$start', '$end', '$event_time', '$place', '$bannerImage')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add event.']);
    }
}

>>>>>>> a5ec8fbde936fd4071677a935f3a0a5f26f98f6f
// Close connection
mysqli_close($conn);
?>