<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Judging System</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php

include('dbcon.php');
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    /* student */
    $query = $conn->prepare("SELECT * FROM organizer WHERE username = :username AND password = :password");
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
    $query->execute();
    $row = $query->fetch();
    $num_row = $query->rowCount();

    if ($num_row > 0) { 
        if ($row['access'] == "Organizer") {
            $_SESSION['useraccess'] = "Organizer";
            $_SESSION['id'] = $row['organizer_id'];
            ?>
            <script>
                window.location = 'dashboard.php';
            </script>
            <?php
        }
    } else { 
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Invalid User or Password',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = 'index.php';
                }
            });
        </script>
        <?php
    }
} else {
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Invalid User or Password',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'index.php';
            }
        });
    </script>
    <?php
}
?>
</body>
</html>
