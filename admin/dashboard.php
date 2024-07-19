<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="theme-color" content="#3e454c">
<link rel="shortcut icon" href="ejs_logo.png"/>
<title>Event Judging System</title> 
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .sidebar-heading {
        text-align: center;
        padding: 10px 0;
        background-color: #555;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        background-color: #333;
        color: #fff;
        padding-top: 60px;
        overflow-y: auto;
        transition: width 0.3s;
    }

    .sidebar.minimized {
        width: 80px;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        padding: 10px;
        border-bottom: 1px solid #555;
    }

    .sidebar ul li a {
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .sidebar ul li a i {
        margin-right: 10px;
    }

    .sidebar ul li a span {
        display: inline-block;
        transition: opacity 0.3s;
    }

    .sidebar.minimized ul li a span {
        opacity: 0;
    }

    .sidebar ul li a:hover {
        background-color: #555;
    }

    .main {
        margin-left: 250px;
        padding: 20px;
        transition: margin-left 0.3s;
    }

    .main.minimized {
        margin-left: 80px;
    }

    .toggle-btn {
        position: fixed;
        top: 20px;
        left: 220px;
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px;
        cursor: pointer;
        transition: left 0.3s;
    }

    .toggle-btn.minimized {
        left: 50px;
    }

    .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .logo img {
        max-width: 100px;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .main {
            margin-left: 0;
        }

        .toggle-btn {
            left: 90%;
        }
    }
</style>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <button class="toggle-btn" id="toggle-btn">☰</button>
    <div class="logo">
        <img src="../assets/img/mcc_logo.png" alt="Event Judging System Logo">
    </div>
    
    <ul>
        <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> <span>DASHBOARD</span></a></li>
        <li><a href="home.php"><i class="fas fa-calendar-check"></i> <span>ONGOING EVENTS</span></a></li>
        <li><a href="upcoming_events.php"><i class="fas fa-calendar-alt"></i> <span>UPCOMING EVENTS</span></a></li>
        <li><a href="score_sheets.php"><i class="fas fa-clipboard-list"></i> <span>SCORE SHEETS</span></a></li>
        <li><a href="rev_main_event.php"><i class="fas fa-chart-line"></i> <span>DATA REVIEWS</span></a></li>
        <li><a href="#" id="logout"><i class="fas fa-sign-out-alt"></i> <span>LOGOUT</span></a></li>
    </ul>
</div>

<!-- Main content -->
<div class="main" id="main">
    <h1>Dashboard</h1>
    <!-- Event Cards -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card bg-gradient-info text-black">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Ongoing Events</h4>
                    <?php 
                    $database = mysqli_connect('localhost', 'root', '', 'judging');
                    $sql = "SELECT count(1) FROM sub_event";
                    $result = mysqli_query($database, $sql);
                    $row = mysqli_fetch_array($result);
                    $ongoing_events = $row[0];
                    ?>
                    <h2 class="mb-4"><?php echo $ongoing_events; ?></h2>
                    <a class="btn btn-primary btn-sm" href="home.php">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card bg-gradient-info text-black">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Upcoming Events</h4>
                    <?php 
                    $currentDate = date("Y-m-d");
                    $sql = "SELECT COUNT(*) FROM upcoming_events WHERE DATE(start_date) > '$currentDate'";
                    $result = mysqli_query($database, $sql);
                    $count = mysqli_fetch_array($result)[0];
                    $upcoming_events = $count;
                    ?>
                    <h2 class="mb-4"><?php echo $upcoming_events; ?></h2>
                    <a class="btn btn-success btn-sm" href="upcoming_events.php">View Events</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Pie Chart -->
    <div class="row">
        <div class="col-md-12">
            <canvas id="eventsPieChart"></canvas>
        </div>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Chart.js JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.getElementById('logout').addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to log out?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '..//index.php';
            }
        });
    });

    // Toggle Sidebar
    document.getElementById('toggle-btn').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        var main = document.getElementById('main');
        var toggleBtn = document.getElementById('toggle-btn');
        sidebar.classList.toggle('minimized');
        main.classList.toggle('minimized');
        toggleBtn.classList.toggle('minimized');
    });

    // Pie Chart
    var ctx = document.getElementById('eventsPieChart').getContext('2d');
    var eventsPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Ongoing Events', 'Upcoming Events'],
            datasets: [{
                label: '# of Events',
                data: [<?php echo $ongoing_events; ?>, <?php echo $upcoming_events; ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>
</body>
</html>
