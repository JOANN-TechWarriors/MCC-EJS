<?php
include('dbcon.php');
date_default_timezone_set('Asia/Manila');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $query = "UPDATE events SET title=?, start_event=?, end_event=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $title, $start, $end, $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
