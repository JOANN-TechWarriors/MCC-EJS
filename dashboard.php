<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
    <title>MCC Event Judging System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .sidebar-heading {
            top: 100px;
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
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #555;
        }

        .main {
            margin-left: 250px;
            padding: 20px;
        }

        /* Responsive adjustments */
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
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-heading">
            MCC Event Judging System
        </div>
        <br>
        <br>
        <ul>
            <li><a href="dashboard.php">DASHBOARD</a></li>
            <li><a href="home.php">ONGOING EVENTS</a></li>
            <li><a href="upcoming_events.php">UPCOMING EVENTS</a></li>
            <li><a href="score_sheets.php">SCORE SHEETS</a></li>
            <li><a href="rev_main_event.php">DATA REVIEWS</a></li>
            <li><a href="index.php">LOGOUT</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="main">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page content -->
        <h1>Dashboard</h1>
        <br>
        <br>
        <br>
        <!-- Event Cards -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card bg-gradient-info text-black">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">Ongoing Events</h4>
                        <?php 
                        $database = mysqli_connect('127.0.0.1', 'u510162695_judging_root', '1Judging_root', 'u510162695_judging');
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
        <!-- End Event Cards -->
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
