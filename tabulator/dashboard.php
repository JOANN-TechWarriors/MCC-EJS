<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="theme-color" content="#3e454c">
<link rel="shortcut icon" href="../admin/ejs_logo.png"/>
<title>Event Judging System</title> 
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      margin: 0;
      padding: 0;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 250px;
      background-color: #333;
      color: #fff;
      padding-top: 20px;
      transition: all 0.3s;
      overflow: hidden;
    }

    .sidebar.collapsed {
      width: 80px;
    }

    .sidebar .toggle-btn {
      position: absolute;
      top: 10px;
      right: -0px;
      background-color: transparent;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
    }

    .sidebar .toggle-btn i {
      font-size: 18px;
    }

    .sidebar-heading {
      text-align: center;
      padding: 10px 0;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .sidebar-heading img {
      max-width: 100px;
      max-height: 100px;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .sidebar ul li {
      padding: 10px;
      border-bottom: 1px solid #555;
      transition: all 0.3s;
    }

    .sidebar ul li a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
    }

    .sidebar ul li a i {
      margin-right: 10px;
      transition: margin 0.3s;
    }

    .sidebar.collapsed ul li a i {
      margin-right: 0;
    }

    .sidebar ul li a span {
      display: inline-block;
      transition: opacity 0.3s;
    }

    .sidebar.collapsed ul li a span {
      opacity: 0;
      width: 0;
      overflow: hidden;
    }

    .sidebar ul li a:hover {
      background-color: #555;
    }

    .main {
      margin-left: 250px;
      padding: 20px;
      transition: all 0.3s;
    }
    #eventsPieChart, #eventsBarChart {
      width: 100%;
      height: 400px; /* Adjust the height as needed */
      
    }

    .main.collapsed {
      margin-left: 80px;
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
    }
  </style>
</head>
<body>
  <div class="sidebar" id="sidebar">
    <button class="toggle-btn" id="toggle-btn">☰</button>
    <div class="sidebar-heading">
      <img src="../img/logo.png" alt="Logo">
      <div>Event Judging System</div>
    </div>
    <ul>
        <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> <span>DASHBOARD</span></a></li>
        <li><a href="#"><i class="fas fa-calendar-check"></i> <span>ONGOING EVENTS</span></a></li>
        <li><a href="#"><i class="fas fa-calendar-alt"></i> <span>UPCOMING EVENTS</span></a></li>
        <li><a href="score_sheets.php"><i class="fas fa-clipboard-list"></i> <span>SCORE SHEETS</span></a></li>
        <li><a href="#"><i class="fas fa-chart-line"></i> <span>DATA REVIEWS</span></a></li>
        <li><a href="#" id="logout"><i class="fas fa-sign-out-alt"></i> <span>LOGOUT</span></a></li>
    </ul>
  </div>

<!-- Main content -->
<div class="main" id="main">
    <h1>Dashboard</h1>
    <!-- Event Cards -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card bg-gradient-info text-black" style="background-color: #e3f7fd;">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3" style="font-size: 20px;">Ongoing Events</h4>
                    <?php 
                    $database = mysqli_connect('localhost', 'root', '', 'judging');
                    $sql = "SELECT count(1) FROM sub_event";
                    $result = mysqli_query($database, $sql);
                    $row = mysqli_fetch_array($result);
                    $ongoing_events = $row[0];
                    ?>
                    <h2 class="mb-4"><?php echo $ongoing_events; ?></h2>
                    <a class="btn btn-primary btn-sm" href="#">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card bg-gradient-info text-black" style="background-color: #b0ffc3;">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3" style="font-size: 20px;">Upcoming Events</h4>
                    <?php 
                    $currentDate = date("Y-m-d");
                    $sql = "SELECT COUNT(*) FROM upcoming_events WHERE DATE(start_date) > '$currentDate'";
                    $result = mysqli_query($database, $sql);
                    $count = mysqli_fetch_array($result)[0];
                    $upcoming_events = $count;
                    ?>
                    <h2 class="mb-4"><?php echo $upcoming_events; ?></h2>
                    <a class="btn btn-success btn-sm" href="#">View Events</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Charts -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Events Overview</h4>
                    <canvas id="eventsPieChart" style="height: 320px; width: 520px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Event Statistics</h4>
                    <canvas id="eventsBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('..//admin/footer.php') ?>
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
        sidebar.classList.toggle('collapsed');
        main.classList.toggle('collapsed');
    });

    // Pie Chart
    var ctxPie = document.getElementById('eventsPieChart').getContext('2d');
    var eventsPieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Ongoing Events', 'Upcoming Events'],
            datasets: [{
                label: '# of Events',
                data: [<?php echo $ongoing_events; ?>, <?php echo $upcoming_events; ?>],
                backgroundColor: [
                    'rgba(255, 0, 0, 0.4)',
                    'rgba(1, 254, 1, 0.6)'
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
            },
            maintainAspectRatio: false
        }
    });

    // Bar Chart
    var ctxBar = document.getElementById('eventsBarChart').getContext('2d');
    var eventsBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Ongoing Events', 'Upcoming Events'],
            datasets: [{
                label: 'Number of Events',
                data: [<?php echo $ongoing_events; ?>, <?php echo $upcoming_events; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
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
            },
            maintainAspectRatio: false
        }
    });

    // Set custom dimensions after chart initialization
    ctxPie.canvas.parentNode.style.height = '400px';
    ctxPie.canvas.parentNode.style.width = '100%';
    ctxBar.canvas.parentNode.style.height = '400px';
    ctxBar.canvas.parentNode.style.width = '100%';

</script>
</body>
</html>
