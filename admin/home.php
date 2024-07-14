<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include('header2.php');
    include('session.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '..//phpmailer/src/Exception.php';
    require '..//phpmailer/src/PHPMailer.php';
    require '..//phpmailer/src/SMTP.php';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCCEvent Judging System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        @media (max-width: 760px) {
            .sidebar {
                display: none;
            }
            .main {
                margin-left: 250px;
                padding: 20px;
                width: 100%;
            }
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            background-color: #333;
            color: #fff;
            width: 250px; /* Adjust width as needed */
            padding-top: 100px;
            overflow-y: auto;
        }

        .sidebar-heading {
            top: 100px;
            text-align: center;
            padding: 10px 0;
            background-color: #555;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 8px 15px;
            border-bottom: 1px solid #444;
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
            margin-left: 250px; /* Same width as sidebar */
            padding: 20px;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            position: fixed;
            width: 100%;
            z-index: 99;
        }

        .navbar-brand {
            font-size: 20px;
            padding: 0 15px;
        }

        .navbar .navbar-nav {
            float: right;
        }

        .navbar .navbar-nav li {
            display: inline-block;
            padding: 0 10px;
        }

        .navbar .navbar-nav li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 15px;
        }

        .navbar .navbar-nav li.active a {
            background-color: #555;
        }

        .dropdown-menu {
            background-color: #333;
            border: none;
        }

        .dropdown-menu a {
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-heading">
            MCC Event Judging System
        </div>
        
        <ul>
            <li>
                <a href="dashboard.php">DASHBOARD</a>
            </li>
            <li>
                <a href="home.php">ONGOING EVENTS</a>
            </li>
            <li>
                <a href="upcoming_events.php">UPCOMING EVENTS</a>
            </li>
            <li>
                <a href="score_sheets.php">SCORE SHEETS</a>
            </li>
            <li>
                <a href="rev_main_event.php">DATA REVIEWS</a>
            </li>
            <li>
                <a href="index.php">LOGOUT</a>
            </li>
            <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">MY ACCOUNT<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
 
              
              <li>
                  <a target="_blank" href="edit_organizer.php">Settings</a>
              </li>
 
              <li>
                <a href="logout.php">Logout <?php echo $name; ?></a>
              </li> -->
              
                </ul>
            </li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="main">
        <!-- Navbar -->
        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">MCC Event Judging System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php"><strong>ONGOING EVENTS</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="upcoming_events.php"><strong>UPCOMING EVENTS</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="score_sheets.php">SCORE SHEETS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rev_main_event.php">DATA REVIEWS</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                MY ACCOUNT -->
                            <!-- </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="edit_organizer.php" target="_blank">Settings</a>
                                <a class="dropdown-item" href="logout.php">Logout <?php echo $name; ?></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> -->

        <!-- Page content -->
        <!-- <div class="container-fluid">
            <header class="jumbotron subhead" id="overview">
                <div class="container">
                    <h1>Ongoing Events</h1>
                    <p class="lead">Event Judging System</p>
                </div>
            </header> -->
            <div class="container">
                    <h1>Ongoing Events</h1>
                    
                </div>

            <div class="span15">
                <br />
                <div class="col-md-15">
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>Ongoing Events</li>
                    </ul>
                </div>
            </div>

            

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

                


        <!-- Download
        ================================================== -->
        <section id="download-bootstrap">
          <div class="page-header">
 
 
 
<table style="width: 100% !important;" align="center">
 
                            <tr>
                                               
                            <td>
                            
                           
                            
                            <div id="addMEcollapse" class="panel-collapse collapse">
    <form method="POST">
        <table align="center" class="table table-bordered cp" id="example">
            <thead>
                <th>
                    <h4><strong>ADD MAIN EVENT</strong>
                        <a data-toggle="collapse" class="btn btn-default pull-right" href="#addMEcollapse" title="Click to add Main Event"><i class="icon-remove"></i> CANCEL</a>
                    </h4>
                </th>
            </thead>
            <tr>
                <td>
                    <strong>Event #:</strong><br />
                    <input name="sy" class="form-control btn-block" style="text-indent: 5px !important; height: 30px !important;" type="number" placeholder="0" required="true" />
                    <br />
                    <strong>Event Name:</strong><br />
                    <input type="text" name="main_event" class="form-control btn-block" style="text-indent: 5px !important; height: 30px !important;" placeholder="Event Name" required="true" />
                    <br />
                    <strong>Date Start:</strong><br />
                    <div class="container">
                        <input type="date" id="demo" min="2023-04-25" class="form-control btn-block" required="true">
                    </div>
                    <strong>Date End:</strong><br />
                    <div class="container">
                        <input type="date" id="demo" min="2023-04-25" class="form-control btn-block" required="true">
                    </div>
                    <strong>Time Start:</strong><br />
                    <div class="container">
                        <input type="time" name="event_time" type="text" required="true" placeholder="hh:mm" class="form-control btn-block">
                    </div>
                    <strong>Venue:</strong><br />
                    <textarea name="place" type="text" class="form-control btn-block" style="text-indent: 10px !important;" placeholder="Event Venue" required="true" rows="2"></textarea>
                    <br />
                    <div class="modal-footer">
                        <button title="Clear form" type="reset" class="btn btn-default"><i class="icon-ban-circle"></i> <strong>RESET</strong></button>
                        <button title="Click to save" name="create" type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>SAVE</strong></button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>

<a style="margin-bottom: 20px !important;" data-toggle="collapse" class="btn btn-info pull-right" href="#addMEcollapse" title="Click to add Main Event"><i class="icon icon-plus" float="center"></i> <strong>MAIN EVENT</strong></a>

<?php   
$sy_query = $conn->query("select DISTINCT sy FROM main_event where organizer_id='$session_id'") or die(mysql_error());
while ($sy_row = $sy_query->fetch()) {
    $sy = $sy_row['sy'];
    $MEctrQuery = $conn->query("select * FROM main_event where sy='$sy'") or die(mysql_error());
    $MECtr = $MEctrQuery->rowCount();
?>

<tr>
    <td>
        <a data-toggle="collapse" href="#MainEvents<?php echo $sy; ?>" style="text-align: left !important; text-indent: 7px !important" class="btn btn-warning btn-block">
            <i class="icon icon-folder-close"></i><?php echo $sy; ?> 
            <span class="badge badge-info pull-right" style="margin-right: 7px !important;">
                <strong><?php echo $MECtr > 1 ? $MECtr . " Events" : ($MECtr == 1 ? $MECtr . " Event" : "0 Event"); ?></strong>
            </span> 
        </a>
        <div class="panel-collapse collapse" id="MainEvents<?php echo $sy; ?>"> 
            <br />
            <table align="right" style="width: 97% !important;" id="example">
                <?php
                $myME_ctr = 0;
                $event_query = $conn->query("select * from main_event where organizer_id='$session_id' AND sy='$sy'") or die(mysql_error());
                while ($event_row = $event_query->fetch()) {
                    $myME_ctr++;
                    $main_event_id = $event_row['mainevent_id'];
                    $SEctrQuery = $conn->query("select * FROM sub_event where mainevent_id='$main_event_id'") or die(mysql_error());
                    $SECtr = $SEctrQuery->rowCount();
                ?>
                <tr>
                    <td colspan="3">
                        <?php if($event_row['status'] == "deactivated") { ?>
                            <a style="text-align: left !important; text-indent:7px !important;" data-toggle="collapse" class="btn btn-default btn-block" title="Complete Event name: <?php echo $event_row['event_name']; ?>. This Main Event is deactivated" href="#collapse2<?php echo $main_event_id; ?>">
                                <?php echo $myME_ctr . ". " . substr($event_row['event_name'], 0, 22); ?>
                                <span class="badge badge-default pull-right" style="margin-right: 7px !important;"><?php echo $SECtr > 1 ? $SECtr . " Sub-Events" : ($SECtr == 1 ? $SECtr . " Sub-Event" : "0 Sub-Event"); ?></span>
                            </a>
                        <?php } else { ?>
                            <a title="Complete Event name: <?php echo $event_row['event_name']; ?>" style="text-align: left !important; text-indent:7px !important;" data-toggle="collapse" class="btn btn-info btn-block" href="#collapse2<?php echo $main_event_id; ?>">
                                <?php echo $myME_ctr . ". " . substr($event_row['event_name'], 0, 22); ?>
                                <span class="badge badge-warning pull-right" style="margin-right: 7px !important;"><?php echo $SECtr > 1 ? $SECtr . " Sub-Events" : ($SECtr == 1 ? $SECtr . " Sub-Event" : "0 Sub-Event"); ?></span>
                            </a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="panel-collapse collapse" id="collapse2<?php echo $main_event_id; ?>">
                            <!-- Sub-Event details go here -->
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </td>
</tr>
<?php } ?>

     
                                    <!-- start of List of sub-events -->
                                                
                                    
                                     
                                    <div id="collapse2<?php echo $main_event_id; ?>" class="panel-collapse collapse"> 
                 
                                    <table align="right" style="width: 97% !important;" id="example">
                                    
                                    
                                    <tr>
                                    
                                    <td colspan="3">
                                   
    <div id="myGroup<?php echo $main_event_id; ?>">
    
    <?php if($event_row['status']=="deactivated") { ?>
    
    <a class="btn btn-default"><i class="icon-list"></i></a>
    
    <?php } else { ?>
    
    <a class="btn btn-info" data-toggle="collapse" data-target="#listSubEvents<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon-list"></i></a>
      
    <?php }?>
 
    <?php if($event_row['status']=="activated") { ?>
    
    <a data-toggle="collapse" data-target="#ActivateDeactivate<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>" class="btn btn-warning" title="Click to deactivate <?php echo $event_row['event_name']; ?>. Current Status is: Activated" data-toggle="collapse" data-target="#keys" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon icon-eye-open"></i></a>
 
    <?php }else{ if($event_row['status']=="deactivated"){ ?>
    
    <a data-toggle="collapse" data-target="#ActivateDeactivate<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>" class="btn btn-danger" title="Click to activate <?php echo $event_row['event_name']; ?>. Current Status is: Deactivated" data-toggle="collapse" data-target="#keys" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon icon-eye-close"></i></a>
    
    <?php }} ?>
                        
    <?php if($event_row['status']=="deactivated") { ?>
    
    <a class="btn btn-default"><i class="icon-plus"></i></a>
    <a class="btn btn-default"><i class="icon-pencil"></i></a>
    <a class="btn default"><i class="icon-trash"></i></a>
    <a class="btn btn-default" title="Click to print data of Main Event: <?php echo $event_row['event_name']; ?>" href="print_all_results.php?main_event_id=<?php echo $main_event_id; ?>" data-toggle="collapse" data-target="#edit" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon-print"></i></a>
    
    <?php } else { ?>
    
    <a class="btn btn-primary" data-toggle="collapse" data-target="#addSubEvents<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon-plus"></i></a>
    <a class="btn btn-success" data-toggle="collapse" data-target="#editEvent<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon-pencil"></i></a>
    <a class="btn btn-danger" data-toggle="collapse" data-target="#deleteEvent<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon-remove"></i></a>
    <a target="_blank" class="btn btn-default" title="Click to print data of Main Event: <?php echo $event_row['event_name']; ?>" href="print_all_results.php?main_event_id=<?php echo $main_event_id; ?>" data-toggle="collapse" data-target="#edit" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon-print"></i></a>
          
    <?php }?>
    
    <br />
                                
        <div style="border: 0px !important;" class="accordion-group">
                
                <div class="collapse indent" id="listSubEvents<?php echo $main_event_id; ?>">
                                    
                                    <h4>List of Events</h4>
                                    <table align="center" class="table table-bordered" id="example">
                                    
                                    <thead>
                                    
                                    <th><strong>Event Name</strong></th>
                                    
                                    <th><center><strong>Status</strong></center></th>
                                    <th><center><strong>Actions</strong></center></th>
                                    </thead>
                            
                                    <?php
                                    $se_ctr=0;
                                    $sub_event_query = $conn->query("select * from sub_event where mainevent_id='$main_event_id'") or die(mysql_error());
                                    while ($sub_event_row = $sub_event_query->fetch()) 
                                    { 
                                    $se_ctr++;
                                    $sub_event_id=$sub_event_row['subevent_id'];   ?>
                                         
                                    <tr>
                            
                                    <td>
                                    <strong><?php echo $se_ctr.". ".$sub_event_row['event_name']; ?></strong>
                                    
                                    <div id="editMEcollapse<?php echo $sub_event_row['subevent_id']; ?>" class="panel-collapse collapse">
                                    
                                    <div class="pull-right">
                                    <table class="table table-bordered">
                                    
                                    <tr>
                                    <td><h4>Edit Event</h4></td>
                                    </tr>
                                    <tr>
                                    <td>
                                    
                                    <form method="POST">
                                    <input type="hidden" name="sub_event_id" value="<?php echo $sub_event_row['subevent_id']; ?>" />
                                    <input type="hidden" name="se_name" value="<?php echo $sub_event_row['event_name']; ?>" />
                                    <input name="se_new_name" type="text" placeholder="Enter Sub-Event Title" value="<?php echo $sub_event_row['event_name']; ?>" />
                                    <br />
                                    <button style="margin-right: 5px !important;" name="edit_se" class="btn btn-success pull-right"><i class="icon-ok"></i> <strong>UPDATE</strong></button>
                                    </form>
                                    
                                    </td>
                                    </tr>
                                    </table>
                                    
                                    </div>
                                    
                                    </div>
                                    
                                    <?php 

                                    if(isset($_POST['edit_se']))
                                    {
                                        
                                        $se_name=$_POST['se_name'];
                                        $sub_event_id=$_POST['sub_event_id'];
                                        $se_new_name=$_POST['se_new_name'];
                                       
                                      
                                       /* contestants */
                                       
                                        $conn->query("update sub_event set event_name='$se_new_name' where subevent_id='$sub_event_id'");
                                       
                                      
                                     ?>
                                     
                                    <script>		                                      
                                    window.location = 'home.php';
                                    alert('Sub-Event title: <?php echo $se_name." was changed to: ".$se_new_name; ?> successfully!');						
                                    </script>
                                    
                                    <?php  
                                     
                                     
                                    } ?>
                                    
                                    <br />
                                    
                                    <div id="deleteMEcollapse<?php echo $sub_event_row['subevent_id']; ?>" class="panel-collapse collapse">
                                    
                                    <div class="pull-right">
                                    
                                    <table class="table table-bordered">
                                    
                                    <tr>
                                    <td><h4>Delete Event</h4></td>
                                    </tr>
                                    <tr>
                                    <td>
                                    
                                    <?php 
                                    $place_query = $conn->query("select * from sub_results where subevent_id='$sub_event_id'") or die(mysql_error());
                                    if($place_query->rowCount()==0)
                                    { ?>
                                    
                                    <form method="POST">
                                    
                                    <input type="hidden" name="sub_event_id" value="<?php echo $sub_event_row['subevent_id']; ?>" />
                                    <input type="hidden" name="se_name" value="<?php echo $sub_event_row['event_name']; ?>" />
                  
                                    <input id="myInput" name="entered_pass" type="password" placeholder="Enter Organizer's Password" />
                                    <br />
                                    <p><input style="padding-top: 0px !important; margin-top: 0px !important;" type="checkbox" onclick="myFunctionDSE()"/> <strong>Show Password</strong></p>
                                    
                                    
                                    <script>
                                    function myFunctionDSE() {
                                        var x = document.getElementById("myInput");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                    </script>

                                   
                                    <br />
                                    <button style="margin-right: 5px !important;" name="deleteSubEvent" class="btn btn-danger pull-right"><i class="icon-ok"></i> <strong>DELETE</strong></button>
                                    </form>
                                    
                                    <?php } else { ?>
                                    <!-- <div class="alert alert-warning"> -->
                                    <!-- <h3>Cannot delete Event. There are saved data for this Event.</h3> -->
                                    </div>
                                    
                                    <?php } ?>
                                    
                                    
                                    </td>
                                    </tr>
                                    </table>
                                    
                                    </div>
                                    
                                    </div>
                                    
                                    
                                    <?php
                                    
                                    if(isset($_POST['deleteSubEvent']))
                                    {
                                    
                                    $sub_event_id=$_POST['sub_event_id'];
                                    $entered_pass=$_POST['entered_pass'];
                                    $se_name=$_POST['se_name'];
                  
                                    if($check_pass==$entered_pass)
                                    {
                                   
                                            $conn->query("delete from sub_event where subevent_id='$sub_event_id'"); 
                                            
                                            $conn->query("delete from contestants where subevent_id='$sub_event_id'"); 
                                            
                                            $conn->query("delete from criteria where subevent_id='$sub_event_id'"); 
                                             
                                            $conn->query("delete from judges where subevent_id='$sub_event_id'"); 
                               
                                        ?>
                                 
                                            
                                        <script>
                                        window.location = 'home.php';
                                        alert('Sub-Event: <?php echo $se_name; ?> and its related data deleted successfully. . .');						
                                        </script> 
                                        
                                         
                                           <?php } else { ?>
                                            
                                        <script>
                                        window.location = 'home.php';
                                        alert('Bad Password! Try Again');						
                                        </script>   
                                            
                                                
                                           <?php } }  ?>
   
   
                                    </td>
                                     
                                    <?php
                                    if($sub_event_row['status']=="activated")
                                    { ?>
                                         
                                    <td width="10"><center><strong><i style="color: green;">Active</i></strong></center></td>
                                        
                                    <td width="175">
                                    <center>
                                    
                                    <a title="Click to Deactivate <?php echo $sub_event_row['event_name'];?>. Current Status: Active" target="_blank" onclick="javascript: setTimeout(window.close, 10);" href="sub_event_stat_update.php?status=<?php echo $sub_event_row['status']; ?>&se_name=<?php echo $sub_event_row['event_name']; ?>&sub_event_id=<?php echo $sub_event_row['subevent_id']; ?>" class="btn btn-danger"><i class="icon icon-off"></i></a>
                                          
                                    <a title="Click to view <?php echo $sub_event_row['event_name'];?> Data and Settings" href="sub_event_details.php?sub_event_id=<?php echo $sub_event_row['subevent_id']; ?>&se_name=<?php echo $sub_event_row['event_name']; ?>" class="btn btn-primary"><i class="icon icon-plus"></i></a>
                                    
                                    
                                    <a title="Click to edit <?php echo $sub_event_row['event_name'];?>'s Title" data-toggle="collapse" data-target="#editMEcollapse<?php echo $sub_event_row['subevent_id']; ?>" class="btn btn-success"><i class="icon icon-pencil"></i></a>
                                    
                                 
                            
                                    <a data-toggle="collapse" data-target="#deleteMEcollapse<?php echo $sub_event_row['subevent_id']; ?>" title="Click to delete <?php echo $sub_event_row['event_name'];?>." class="btn btn-danger"><i class="icon icon-trash"></i></a>
                                     
                                    </center>
                                    </td>
                                         
                                    <?php }else{  ?>
                                             
                                    <td width="10"><center><strong><i>Inactive</i></strong></center></td>  
                                        
                                    <td width="175">
                                    <center>
                                    <a title="Click to Activate <?php echo $sub_event_row['event_name'];?>. Current Status: Deactive" target="_blank" onclick="javascript: setTimeout(window.close, 10);" href="sub_event_stat_update.php?status=<?php echo $sub_event_row['status']; ?>&se_name=<?php echo $sub_event_row['event_name']; ?>&sub_event_id=<?php echo $sub_event_row['subevent_id'];?>" class="btn btn-success"><i class="icon icon-off"></i></a>
                                    <a class="btn btn-default"><i class="icon icon-plus"></i></a>
                                    <a class="btn btn-default"><i class="icon icon-pencil"></i></a>
                                    <a class="btn btn-default"><i class="icon icon"></i></a>
                                    
                                    </center>
                                    </td>
                                         
                                    <?php } ?>
                                        
                                    </tr>
                                        
                                    <?php } if($se_ctr>0){ ?>
                          
                                     
                                    <?php } else{ ?>
                                    
                                    <tr>
                                    <td colspan="3">
                                    <div class="alert alert-warning">
                                    <h3>
                                    No data to display. Add Event <a href="#" data-toggle="collapse" data-target="#addSubEvents<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>"> here &raquo;</a>
                                    </h3>
                                    </div>
                                    </td>
                                    </tr>   
                                            
                                    <?php }?>
                                    </table>
                
                
                </div>
                
                <div class="collapse" id="ActivateDeactivate<?php echo $main_event_id; ?>">
                
                <?php if($event_row['status']=="activated") { ?>
                <h4>Deactivate Event <i><?php echo $event_row['event_name']; ?></i>?</h4>
                <?php }else{ if($event_row['status']=="deactivated"){ ?>
                <h4>Activate Event <i><?php echo $event_row['event_name']; ?></i>?</h4>
                <?php }} ?>
    
                
                    <table align="center" class="table table-bordered" id="example">
                    <tr>
                    <td>
                    
                      <form method="POST">
      
                      <input name="status" type="hidden" value="<?php echo $event_row['status']; ?>" />
                      <input name="main_event_id" type="hidden" value="<?php echo $main_event_id; ?>" />
                      <input name="ma_name" type="hidden" value="<?php echo $event_row['event_name']; ?>" />
                       
                       
                       
                       <?php 
                       if($event_row['status']=="activated")
                       { ?>
                       
                       
                        <div class="modal-body">
                        <strong>Confirmation Password</strong>:<br />
                        <input placeholder="Enter Organizer's Password" name="check_pass" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" type="password" required="true"/> 
                        </div>
                                    
                        <div class="modal-footer">
                        <button  class="btn btn-danger" name="activation" ><i class="icon icon-eye-close"></i> <strong>DEACTIVATE</strong></button> 
                        </div>
                  
                       
                       <?php
                       }
                       else
                       { 
                         if($event_row['status']=="deactivated")
                         {
                        ?>
                        
                        <div class="modal-body">
                        <strong>Confirmation Password</strong>:<br />
                        <input placeholder="Enter Organizer's Password" name="check_pass" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" type="password" required="true"/> 
                        </div>
                        
                        <div class="modal-footer">
                        <button  class="btn btn-success" name="activation" ><i class="icon icon-eye-open"></i> <strong>ACTIVATE</strong></button> 
                        </div>
                              
                               
                        <?php }  } ?>
                                  
                        </form>
                        
                    </td>
                    </tr>
                    </table>
                    
                </div>
                
                <div class="collapse indent" id="addSubEvents<?php echo $main_event_id; ?>">
                
                                      <!-- ADD Events -->
                                      
                                      <h4>Add Events</h4>
                                      <table align="center" class="table table-bordered" id="example">
                                      <tr>
                                      <td>
                                      
                                      <form method="POST" enctype="multipart/form-data">
                                      
                                      <input name="main_event_id" type="hidden" value="<?php echo $main_event_id; ?>" />
               
                                       <strong>Banner</strong>:<br />
                                      <input name="banner" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" type="file" required="true"/> 
                                      <br />


                                      <strong>Event Name</strong>:<br />
                                      <input placeholder="Enter Event title" name="event_name" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" type="text" required="true"/> 
                                      <br />
                                     
                                      
<strong>Date Start</strong>:<br />
<div class="container">
   
   <input type="date" id="demo" min="2023-04-25" class="form-control btn-block" required="true">

   </div>

   <strong>Date End</strong>:<br />
<div class="container">
   
   <input type="date" id="demo" min="2023-04-25" class="form-control btn-block" required="true">

   </div>

<strong>Time Start</strong>:<br />
<div class="container">
   
   <input type="time" name="event_time" type="text" required="true" placeholder="hh:mm" class="form-control btn-block">

   </div>


<strong>Time End</strong>:<br />
<div class="container">
   
   <input type="time" name="event_time" type="text" required="true" placeholder="hh:mm" class="form-control btn-block">

   </div>


<strong>Venue</strong>:<br />
<textarea placeholder="Enter Event Venue" rows="2" name="event_place" class="form-control btn-block" style="text-indent: 7px !important;" required="true"></textarea>
<br />
                                    
                                   
                                      
                                      
                                      
                                      <div class="modal-footer">
                                        <button type="reset" class="btn btn-default"><i class="icon-ban-circle"></i> <strong>RESET</strong></button>
                                        <button name="add_event" class="btn btn-primary"><i class="icon-ok"></i> <strong>SAVE</strong></button>
                                      </div>
                                      </form>
                                      
                                      </td>
                                      </tr>
                                      </table>
                                      
                                      <!-- End of ADD Events -->
                                      
                </div>
        
                <div class="collapse indent" id="editEvent<?php echo $main_event_id; ?>">
                
                                     <!-- start of edit of main events -->
                                     
                                      <h4>Edit Event Details</h4>
                                      <table align="center" class="table table-bordered" id="example">
                                      <tr>
                                      <td>
                                      
                                      <form method="POST">
      
      
                                      <?php   
                                          $edit_event_query = $conn->query("select * from main_event where organizer_id='$session_id' and mainevent_id='$main_event_id'") or die(mysql_error());
                                		while ($edit_event_row = $edit_event_query->fetch()) 
                                        {
                                            $edit_mainevent_id=$edit_event_row['mainevent_id'];
                                           
                                             
                                            ?>  
                                      
                                      
                                        <input name="main_event_id" type="hidden" value="<?php echo $edit_mainevent_id; ?>" />
                                      
                                        <strong>Event Name:</strong><br /> 
                                        <input type="text" name="main_event" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" placeholder="Event Name" required="true" value="<?php echo $edit_event_row['event_name']; ?>" />
                                        <br /> 
                                        
                                        
                                        <strong>Date Start:</strong><br /> 
                                        <div class="container">
                                         
                                         <input type="date" id="demo" min="2022-12-12" class="form-control btn-block" required="true">

                                         </div>
                                        <strong>Date End:</strong><br /> 
                                        <div class="container">
                                         
                                         <input type="date" id="demo" min="2022-12-12" class="form-control btn-block" required="true">

                                         </div>
                                        
                                        <strong>Time Start</strong>:<br />
                                        <div class="container">
                                         
                                         <input type="time" name="event_time" type="text" required="true" placeholder="hh:mm" class="form-control btn-block">

                                         </div>
                                      

                                      <strong>Time End</strong>:<br />
                                      <div class="container">
                                         
                                         <input type="time" name="event_time" type="text" required="true" placeholder="hh:mm" class="form-control btn-block">

                                         </div>
                                      

                                        <strong>Venue:</strong><br /> 
                                        <textarea placeholder="Enter Sub-Event Venue" rows="2" name="place" class="form-control btn-block" style="text-indent: 7px !important;" required="true"><?php echo $edit_event_row['place']; ?></textarea>
                                 
                                     
                                      
                                      <?php } ?>
                               
                                      <div class="modal-footer">
                                        <button name="edit_event" class="btn btn-success"><i class="icon-ok"></i> <strong>UPDATE</strong></button>
                                      </div>
                                      
                                      </form>
                                      
                                      </td>
                                      </tr>
                                      </table>
       
                  
                                    <!-- end of edit of main events -->
                </div>
        
                <div class="collapse" id="deleteEvent<?php echo $main_event_id; ?>">
                    
                    <h4>Delete Event <i><?php echo $event_row['event_name']; ?></i>?</h4>
                    
                    
                    <?php 
                    $place_query = $conn->query("select * from sub_results where mainevent_id='$main_event_id'") or die(mysql_error());
                    if($place_query->rowCount()==0)
                    { ?>
                                    
                     <table align="center" class="table table-bordered" id="example">
                    <tr>
                    <td>
                    
                      <form method="POST">
      
                 
                      <input name="main_event_id" type="hidden" value="<?php echo $main_event_id; ?>" />
                      <input name="ma_name" type="hidden" value="<?php echo $event_row['event_name']; ?>" />
 
                        <div class="modal-body">
                        <strong>Confirmation Password</strong>:<br />
                        <input placeholder="Enter Organizer's Password" name="entered_pass" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" type="password" required="true"/> 
                        </div>
                        
                        <div class="modal-footer">
                        <button  class="btn btn-danger" name="deleteEvent" ><i class="icon-trash"></i> <strong>DELETE</strong></button> 
                        </div>
                              
                               
                       
                                  
                        </form>
                        
                        </td>
                        </tr>
                        </table>
                                    
                                    <?php } else { ?>
                                    <!-- <div class="alert alert-warning"> -->
                                  <!-- /  <h3>Cannot delete event. There are saved data for this event.</h3> -->
                                    </div>
                                    
                                    <?php } ?>
                 
                </div>
                
        </div>
        
    </div>
                                    </td>
                         
  
                                    </tr>
                            
                                    </table>
 
                                    </div>
                                          
                                    
                                     
                                    <!-- End of List of sub-events -->
                             
   
                        </td>
                        </tr>
                        
                        <?php  } ?>
      
                        </table>
                                 
                        </div>
 
 </td>
 </tr>
 
 
  <?php  }  ?>
 
  </table>
 
 
 


<?php 

if(isset($_POST['create']))
{
 
   $event_name=$_POST['main_event']; 
  
   $date_start=$_POST['date_start']; 
   $date_end=$_POST['date_end']; 
   $event_place=$_POST['place']; 
   $event_sy=$_POST['sy']; 
 
 
 $org_query = $conn->query("select * from main_event where organizer_id='$session_id'") or die(mysql_error());
		$num_row = $org_query->rowcount();
		      if( $num_row > 0 ) 
              {
                  $conn->query("insert into main_event(event_name,status,organizer_id,date_start,date_end,place,sy)
                  values('$event_name','activated','$session_id','$date_start','$date_end','$event_place','$event_sy')");
              }
              else
              {
                  $conn->query("insert into main_event(event_name,status,organizer_id,date_start,date_end,place,sy)
                  values('$event_name','activated','$session_id','$date_start','$date_end','$event_place','$event_sy')");
 
              } 
            

 
 ?>
<script>
alert('Event <?php echo $event_name; ?> successfully added...');
window.location = 'home.php';
</script>
<?php } ?>




<?php 

if(isset($_POST['add_event']))
{
 
   $main_event_id=$_POST['main_event_id']; 
   $banner = $_FILES['banner']['name'];
   $target = "img/".basename($banner);
   $sub_event_name=$_POST['event_name'];  
   $event_date=$_POST['event_date']; 
   $event_time=$_POST['event_time']; 
   $event_place=$_POST['event_place']; 
  
  $conn->query("insert into sub_event(mainevent_id,event_name,status,eventdate,eventtime,place,organizer_id,banner)
  values('$main_event_id','$sub_event_name','activated','$event_date','$event_time','$event_place','$session_id','$banner')");

  move_uploaded_file($_FILES['banner']['tmp_name'], $target);

 ?>
 <script>
 window.location = 'home.php';
 alert('Sub-Event <?php echo $sub_event_name; ?> created successfully!');						
 </script>
 <?php } ?>
 
 

<?php 

if(isset($_POST['activation']))
{
 
   $status=$_POST['status']; 
   $main_event_id=$_POST['main_event_id'];  
   $check_pass2=$_POST['check_pass']; 
   $ma_name=$_POST['ma_name']; 
   
   if($check_pass==$check_pass2)
   { 
   
  if($status=="activated")
  {
 
    $conn->query("update main_event set status='activated' where mainevent_id='$main_event_id'");
    $conn->query("update sub_event set status='activated' where mainevent_id='$main_event_id'");
     ?>
  <script>
  alert('Event <?php echo $ma_name; ?> activated successfully!');
  window.location = 'home.php';
  </script>
  <?php
  
  }
  else
  {
    
     $conn->query("update main_event set status='deactivated' where mainevent_id='$main_event_id'");
     
  ?>
  <script>
  alert('Event activated <?php echo $ma_name; ?> successfully!');
  window.location = 'home.php';
  </script>
  <?php }
   }
   else
   {
    
    ?>
  <script>
  alert('Confirmation did not match. Try again.');
  window.location = 'home.php';
  </script>
  <?php
    
   } } ?>




<?php 

if(isset($_POST['edit_event']))
{
 
   $main_event_id=$_POST['main_event_id']; 
   $event_name=$_POST['main_event']; 
   $date_start=$_POST['date_start']; 
   $date_end=$_POST['date_end']; 
   $event_place=$_POST['place'];
  
 $conn->query("update main_event set event_name='$event_name',date_start='$date_start',date_end='$date_end',place='$event_place' where mainevent_id='$main_event_id'");
  ?>
 <script>			                                      
 window.location = 'home.php';
 alert('Event <?php echo $event_name; ?> updated successfully!');						
 </script>
  <?php } ?>
  
  
  
<?php

if(isset($_POST['deleteEvent']))
{
    
    $main_event_id=$_POST['main_event_id'];
   
    $entered_pass=$_POST['entered_pass'];
    $ma_name=$_POST['ma_name'];
 
    if($entered_pass==$check_pass)
    {
         $delquery = $conn->query("select * from sub_event where mainevent_id='$main_event_id'") or die(mysql_error());
		while ($del_row = $delquery->fetch()) 
        {
            
            $sub_event_id=$del_row['subevent_id'];
  
            $conn->query("delete * from contestants where subevent_id='$sub_event_id'"); 
             
            $conn->query("delete from criteria where subevent_id='$sub_event_id'"); 
             
            $conn->query("delete from judges where subevent_id='$sub_event_id'"); 
            
            $conn->query("delete from sub_results where subevent_id='$sub_event_id'");  
             
        } 
 
            $conn->query("delete from sub_event where mainevent_id='$main_event_id'");
            
            $conn->query("delete from main_event where mainevent_id='$main_event_id'"); 
       
        ?>
 
            
<script>
window.location = 'home.php';
alert('Event: <?php echo $ma_name; ?> and its Sub-Events and related data deleted successfully. . .');						
</script> 
 
   <?php  } else { ?>
    
<script>
alert('Confirmation did not match. Try again.');
window.location = 'home.php';					
</script>   
    
        
   <?php } }  ?>
  
   
 
 
 
   </div>
 
  </section>

 
      </div>
    </div>

    <?php
  if (isset($_SESSION['email'])) {

      // Connect to database and get upcoming events
      // $pdo = new PDO("mysql:host=localhost;dbname=mydb", "username", "password");
      $stmt = $conn->prepare("SELECT * FROM upcoming_events WHERE start_date BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 1 DAY)");
      $stmt->execute();
      $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $num_rows = $stmt->rowCount();

      // Server settings
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'ejms.notify@gmail.com';                     //SMTP username
      $mail->Password   = 'drccpruwalkfnafd';                               //SMTP password
      $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
      $mail->Port       = 587;                                   //TCP port to connect to

      // Disable certificate verification
      $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
      );

      // Create a table to display the list of upcoming events
      $event_table = '<table style="font-family: Arial, sans-serif; border-collapse: collapse; width: 100%;">';
      $event_table .= '<thead style="background-color: #ddd; text-align: left;"><tr><th style="padding: 12px; border: 1px solid #ddd;">Event Name</th><th style="padding: 12px; border: 1px solid #ddd;">Date</th></tr></thead><tbody>';
      foreach ($events as $event) {
      $event_name = $event['title'];
      $event_date = date('F j, Y', strtotime($event['start_date']));
      $event_table .= '<tr><td style="padding: 12px; border: 1px solid #ddd;">' . $event_name . '</td><td style="padding: 12px; border: 1px solid #ddd;">' . $event_date . '</td></tr>';
      }
      $event_table .= '</tbody></table>';

      // Set up the email message using the event table
      $email_subject = 'Upcoming Events';
      $email_body = '<p style="font-family: Arial, sans-serif; font-size: 16px;">Here are the upcoming events:</p>' . $event_table;

      try {
      // Set up the email recipient
      $mail->setFrom('ejms.notify@gmail.com', 'Event Judging Management System');
      $mail->addAddress($_SESSION['email']);

      // Set up the email message
      $mail->isHTML(true);
      $mail->Subject = $email_subject;
      $mail->Body = $email_body;

      if($num_rows > 0){
        // Send the email
        $mail->send();
        };

      // Output a success message
      // echo '<div class="alert alert-success" role="alert">Push notification sent successfully for upcoming events.</div>';
      } catch (Exception $e) {
      // Output an error message if the email couldn't be sent
      echo '<div class="alert alert-danger" role="alert">Push notification could not be sent for upcoming events. Error:'.  $mail->ErrorInfo .'</div>';
      
}
    } else {
        // User is not logged in, do nothing or display an error message
        echo '<div class="alert alert-danger" role="alert">Your not logged in</div>';
    }

  ?>

   <?php include('footer.php'); ?>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>
    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <script src="assets/js/application.js"></script>
    <script>
        // Hide the alert after 3 seconds
    setTimeout(function(){
      var alert = document.querySelector('.alert');
      if (alert) {
        alert.style.display = 'none';
      }
    }, 3000);
    </script>
  </body>
</html>


