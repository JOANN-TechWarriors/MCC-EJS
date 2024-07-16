<?php
include('dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

/* student */
$query = $conn->query("SELECT * FROM organizer WHERE username='$username' AND password='$password'");
$row = $query->fetch();
$num_row = $query->rowCount();

if ($num_row > 0) {
    if ($row['access'] == "Organizer") {
        $_SESSION['useraccess'] = "Organizer";
        $_SESSION['id'] = $row['organizer_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['login_success'] = 'home.php';
    } elseif ($row['access'] == "Tabulator") {
        $_SESSION['useraccess'] = "Tabulator";
        $_SESSION['id'] = $row['org_id'];
        $_SESSION['userid'] = $row['organizer_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['login_success'] = 'dashboard.php';
    } 
    // Uncomment and modify the following lines if needed for other user roles
    // elseif ($row['access'] == "Judge") {
    //     $_SESSION['useraccess'] = "Judge";
    //     $_SESSION['id'] = $row['judge_id'];
    //     $_SESSION['login_success'] = 'judge_panel.php';
    // } elseif ($row['access'] == "Student") {
    //     $_SESSION['useraccess'] = "Student";
    //     $_SESSION['id'] = $row['student_id'];
    //     $_SESSION['login_success'] = 'home.php';
    // }
} else {
    echo '<script>
        window.onload = function() {
            Swal.fire({
                title: "Error!",
                text: "Username and Password did not Match",
                icon: "error"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            });
        };
    </script>';
    exit;
}

if (isset($_SESSION['login_success'])) {
    echo '<script>
        window.onload = function() {
            Swal.fire({
                title: "Success!",
                text: "You are Successfully logged in!",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "' . $_SESSION['login_success'] . '";
                }
            });
        };
    </script>';
    unset($_SESSION['login_success']);
}
?>