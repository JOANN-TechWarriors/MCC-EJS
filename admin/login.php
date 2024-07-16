<?php
    include('dbcon.php');
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    /* student */
    $query = $conn->query("SELECT * FROM organizer WHERE username='$username' AND password='$password'");
    $row = $query->fetch();
    $num_row = $query->rowcount();
    if ($num_row > 0) { 
        if ($row['access'] == "Organizer") {
            $_SESSION['useraccess'] = "Organizer";
            $_SESSION['id'] = $row['organizer_id'];
            $_SESSION['email'] = $row['email'];
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'You are successfully logged in!',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'home.php';
                    }
                });
            </script>
            <?php
        } else {
            $_SESSION['useraccess'] = "Tabulator";
            $_SESSION['id'] = $row['org_id'];
            $_SESSION['userid'] = $row['organizer_id'];
            $_SESSION['email'] = $row['email'];
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'You are successfully logged in!',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'dashboard.php';
                    }
                });
            </script>
            <?php
        }
    } else { 
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Username and Password did not match!',
                icon: 'error'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = 'index.php';
                }
            });
        </script>
        <?php
    }
?>
