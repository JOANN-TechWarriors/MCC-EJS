<!DOCTYPE html>
<html lang="en">

<?php
include('header2.php');
include('session.php');
?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
            background-color: #27293d;
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
            top: 20px;
            right: 20px;
            background-color: transparent;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .sidebar .toggle-btn i {
            font-size: 20px;
        }

        .sidebar-heading {
            text-align: center;
            padding: 10px 0;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .logo-container {
            display: block;
            margin-bottom: 10px;
        }

        .logo-img {
            max-width: 100%;
            height: auto;
        }

        .header-text {
            display: block;
            font-size: 20px;
            margin-top: 20px;
        }

        .sidebar-heading img {
            max-width: 50px;
            max-height: 50px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
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
            background-color: #1a1a2e;
        }

        .main {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .main.collapsed {
            margin-left: 80px;
        }

        .header {
            background-color: #f8f9fa;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        .header .profile-dropdown {
            position: relative;
            display: inline-block;
        }

        .header .profile-dropdown img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
        }

        .header .profile-dropdown .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            z-index: 1000;
        }

        .header .profile-dropdown:hover .dropdown-menu {
            display: block;
        }

        .header .profile-dropdown .dropdown-menu a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }

        .header .profile-dropdown .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                overflow: visible;
            }

            .sidebar.collapsed {
                width: 100%;
            }

            .main {
                margin-left: 0;
            }

            .sidebar .toggle-btn {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .sidebar-heading {
                font-size: 14px;
            }

            .sidebar ul li a {
                font-size: 14px;
            }

            .header {
                padding: 5px 10px;
            }

            .header .profile-dropdown img {
                width: 30px;
                height: 30px;
            }

            .chart-container {
                height: 300px;
            }
        }

        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <button class="toggle-btn" id="toggle-btn">☰</button>
        <br><br>
        <div class="sidebar-heading">
            <div class="logo-container">
                <img src="../img/logo.png" alt="Logo" class="logo-img">
            </div>
            <span class="header-text">Event Judging System</span>
        </div>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> <span>DASHBOARD</span></a></li>
            <li><a href="home.php"><i class="fas fa-calendar-check"></i> <span>ONGOING EVENTS</span></a></li>
            <li><a href="upcoming_events.php"><i class="fas fa-calendar-alt"></i> <span>UPCOMING EVENTS</span></a></li>
            <li><a href="score_sheets.php"><i class="fas fa-clipboard-list"></i> <span>SCORE SHEETS</span></a></li>
            <li><a href="rev_main_event.php"><i class="fas fa-chart-line"></i> <span>DATA REVIEWS</span></a></li>
        </ul>
    </div>

    <!-- Header -->
    <div class="header">
        <div>
            <!-- Add any left-aligned content here if needed -->
        </div>
        <div class="profile-dropdown">
            <div style="font-size:small;"> <?php echo $name; ?></div>
            <div class="dropdown-menu">
                <a href="edit_organizer.php"> Account Settings</a>
                <a href="#" id="logout"><i class="fas fa-sign-out-alt"></i> <span>LOGOUT</span></a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main" id="main-content">
        <div class="container">
            <h1 style="font-size: 30px;">Score Sheets</h1>
        </div>

        <div class="span15">
            <br />
            <div class="col-md-15">
                <ul class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a> /</li>
                    <li><a href="#">Ongoing Events</a> /</li>
                    <li><a href="#">Upcoming Events</a> /</li>
                    <li>Score Sheets</li>
                </ul>
            </div>
        </div>

        <?php
        $sy_query = $conn->query("SELECT * FROM main_event WHERE organizer_id='$session_id' AND status='activated'") or die(mysql_error());
        while ($sy_row = $sy_query->fetch()) { 
            $MEidxxx = $sy_row['mainevent_id'];
        ?>

        <div>
            <?php 
            $event_query = $conn->query("SELECT * FROM main_event WHERE mainevent_id='$MEidxxx' AND status='activated'") or die(mysql_error());
            while ($event_row = $event_query->fetch()) { ?>
                <button class="accordion"><strong><?php echo $event_row['event_name']; ?></strong></button> 
            <?php } ?>

            <div class="panel">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>View Score Sheet - Select Judge</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                        $s_event_query = $conn->query("SELECT * FROM sub_event WHERE mainevent_id='$MEidxxx'") or die(mysql_error());
                        while ($s_event_row = $s_event_query->fetch()) { 
                            $se_id = $s_event_row['subevent_id'];
                        ?>
                        <tr>
                            <td>
                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $s_event_row['event_name']; ?></a>
                                            <ul class="dropdown-menu">
                                                <?php
                                                $judge_query = $conn->query("SELECT * FROM sub_event 
                                                    LEFT JOIN result ON sub_event.subevent_id = result.subevent_id 
                                                    LEFT JOIN judge_category ON result.judge_category_id = judge_category.judge_category_id 
                                                    LEFT JOIN judge ON judge_category.judge_id = judge.judge_id 
                                                    WHERE sub_event.subevent_id='$se_id' 
                                                    AND sub_event.status='activated' 
                                                    AND judge_category.status='activated'") 
                                                or die(mysql_error());

                                                while ($judge_row = $judge_query->fetch()) { 
                                                    $jid = $judge_row['judge_id']; 
                                                    $ridz = $judge_row['result_id']; 
                                                ?>
                                                <li>
                                                    <a href="score_sheets2.php<?php echo '?id='.$MEidxxx.'&sub='.$se_id.'&rid='.$ridz.'&jid='.$jid; ?>">
                                                        <?php echo $judge_row['fullname']; ?>
                                                    </a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-warning" onclick="location.href='score_sheets2.php<?php echo '?id='.$MEidxxx.'&sub='.$se_id.'&rid='.$ridz.'&jid='.$jid; ?>'">
                                    View
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteEvent(<?php echo $se_id; ?>)">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>

        <script>
            function deleteEvent(eventId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'delete_event.php?id=' + eventId;
                    }
                });
            }
        </script>
    </div>
</body>

</html>
