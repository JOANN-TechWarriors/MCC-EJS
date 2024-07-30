<!DOCTYPE html>
<html lang="en">
   
   <?php
      
    include('header2.php');
    include('session.php');

    ?>
 <head>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      top: 10px;
      right: -2px;
      background-color: transparent;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 20px;
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
      }
      .sidebar.collapsed {
            width: 100%;
        }

      .main {
        margin-left: 0;
      }
    }
    @media (max-width: 576px) {
        .sidebar-heading {
            font-size: 20px;
        }

        .sidebar ul li a {
            font-size: 20%;
        }

        .header {
            padding: 5px 10px;
        }

        .header .profile-dropdown img {
            width: 30px;
            height: 30px;
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
      <li><a href="home.php"><i class="fas fa-calendar-check"></i> <span>ONGOING EVENTS</span></a></li>
      <li><a href="upcoming_events.php"><i class="fas fa-calendar-alt"></i> <span>UPCOMING EVENTS</span></a></li>
      <li><a href="score_sheets.php"><i class="fas fa-clipboard-list"></i> <span>SCORE SHEETS</span></a></li>
      <li><a href="rev_main_event.php"><i class="fas fa-chart-line"></i> <span>DATA REVIEWS</span></a></li>
    </ul>
  </div>

     
<div class="main" id="main-content">
<div class="container">
    <h1> Ongoing Events</h1>
      </div>

      <div class="span15">
                <br />
                <div class="col-md-15">
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a> /
                        </li>
                        <li>Ongoing Events</li>
                    </ul>
                </div>
            </div>
                


        <!-- Download
        ================================================== -->
        <section id="download-bootstrap">
          <div class="page-header">
 
 
 
<table style="width: 100% !important;" align="center">
 
<a style="margin-bottom: 10px !important;" data-toggle="modal" class="btn btn-info pull-right" href="#addMEcollapse" title="Click to add Main Event"><i class="icon icon-plus"></i> <strong>EVENT</strong></a>



<!-- Modal -->
<div id="addMEcollapse" class="modal fade" role="dialog" >
 <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
         <div class="modal-header">
             <h4 class="modal-title"><strong>ADD EVENT</strong><button type="button" class="close" data-dismiss="modal">&times;</button></h4>
         </div>
         <div class="modal-body">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <strong>Event #:</strong><br />
            <input id="event-number" name="sy" class="form-control btn-block" style="text-indent: 5px !important; height: 30px !important;" type="text" readonly required="true"/>
        </div>
        <div class="form-group">
        <strong>Upload Banner:</strong> <br />
           <input type="file" name="banner" accept="image/*">
        </div>
        <div class="form-group">
            <label for="main_event"><strong>Event Name:</strong></label>
            <input type="text" name="main_event" class="form-control btn-block" style="text-indent: 5px !important; height: 30px !important;" placeholder="Event Name" required="true"/>
        </div>
        <div class="form-group">
            <label for="date_start"><strong>Date Start:</strong></label>
            <input type="date" name="date_start" min="<?php echo date('Y-m-d');?>" class="form-control" style="text-indent: 5px !important; width: 500px !important;" required="true">
        </div>
        <div class="form-group">
            <label for="date_end"><strong>Date End:</strong></label>
            <input type="date" name="date_end" min="<?php echo date('Y-m-d');?>" class="form-control" style="text-indent: 5px !important; width: 500px !important;" required="true">
        </div>
        <div class="form-group">
            <label for="event_time"><strong>Time Start:</strong></label>
            <input id="event-time" type="time" name="event_time" required="true" class="form-control btn-block">
        </div>
        <div class="form-group">
            <label for="place"><strong>Venue:</strong></label>
            <textarea name="place" class="form-control" style="text-indent: 5px !important; width: 500px !important;" placeholder="Event Venue" required="true" rows="2"></textarea>
        </div>
        <div class="modal-footer">
            <button title="Click to save" name="create" type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>SAVE</strong></button> 
            <button type="reset" class="btn btn-default"><i class="icon-ban-circle"></i> <strong>RESET</strong></button>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Generate a random number for the Event #
        const eventNumberField = document.getElementById('event-number');
        eventNumberField.value = Math.floor(Math.random() * 1000) + 1; // Generates a random number between 1 and 1000

        // Restrict time input to 30-minute intervals
        const eventTimeField = document.getElementById('event-time');
        eventTimeField.addEventListener('input', function() {
            const value = eventTimeField.value;
            const [hours, minutes] = value.split(':').map(Number);
            if (minutes % 30 !== 0) {
                eventTimeField.value = `${hours.toString().padStart(2, '0')}:00`;
            }
        });
    });
</script>



 </div>
</div>         
                            
            
<?php   
$sy_query = $conn->query("select DISTINCT sy FROM main_event where organizer_id='$session_id'") or die(mysql_error());
while ($sy_row = $sy_query->fetch()) 
{
            
$sy=$sy_row['sy'];
 
$MEctrQuery = $conn->query("select * FROM main_event where sy='$sy'") or die(mysql_error());
$MECtr = $MEctrQuery->rowCount();  ?>

 
<tr>

<td>

                        <a  data-toggle="collapse" href="#MainEvents<?php echo $sy; ?>" style="text-align: left !important; text-indent: 7px !important" class="btn btn-warning btn-block"><i class="icon icon-folder-close"></i><?php echo $sy; ?> <span class="badge badge-info pull-right" style="margin-right: 7px !important;"><strong><?php if($MECtr>0 AND $MECtr<2){echo $MECtr." Event";} elseif($MECtr>1){ echo $MECtr." Events";}else{ echo "0 Event";} ; ?></strong> </span> </a>
 
       
                
                        <div class="panel-collapse collapse" id="MainEvents<?php echo $sy; ?>"> 
                        
                        <br />
                        
                        <table align="right" style="width: 97% !important;" id="example">
 
       
                        <?php
                        
                        $myME_ctr=0;
                          
                        $event_query = $conn->query("select * from main_event where organizer_id='$session_id' AND sy='$sy'") or die(mysql_error());
                        while ($event_row = $event_query->fetch()) 
                       
                        {
                        
                        
                        
                        $myME_ctr++;
                         
                        $main_event_id=$event_row['mainevent_id'];
                        
                        
                        $SEctrQuery = $conn->query("select * FROM sub_event where mainevent_id='$main_event_id'") or die(mysql_error());
                        $SECtr = $SEctrQuery->rowCount();

                        ?>  
                        
                        <tr>
                        <td colspan="3">
                                   
                        <!-- view events feature -->
                                  
                        <?php
                        if($event_row['status']=="deactivated") { ?>
                                    
                        <a style="text-align: left !important; text-indent:7px !important;" data-toggle="collapse" class="btn btn-default btn-block" title="Complete Event name: <?php echo $event_row['event_name']; ?>. This Main Event is deactivated" href="#collapse2<?php echo $main_event_id; ?>"><?php echo $myME_ctr.". ".substr($event_row['event_name'], 0, 22); ?><span class="badge badge-default pull-right" style="margin-right: 7px !important;"><?php if($SECtr>0 AND $SECtr<2){echo $SECtr." Sub-Event";} elseif($SECtr>1){ echo $SECtr." Sub-Events";}else{ echo "0 Sub-Event";} ; ?></span></a>
                        
                        <?php } else { ?>
                        
                        <a title="Complete Event name: <?php echo $event_row['event_name']; ?>" style="text-align: left !important; text-indent:7px !important;" data-toggle="collapse" class="btn btn-info btn-block" href="#collapse2<?php echo $main_event_id; ?>"><?php echo $myME_ctr.". ".substr($event_row['event_name'], 0, 22); ?><span class="badge badge-warning pull-right" style="margin-right: 7px !important;"><strong><?php if($SECtr>0 AND $SECtr<2){echo $SECtr." Sub-Event";} elseif($SECtr>1){ echo $SECtr." Sub-Events";}else{ echo "0 Sub-Event";} ; ?></strong></span></a>
                        
                        <?php }?>
 
                        </td></tr>
                        <tr>
                        
                        <td colspan="3">
     
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
    
    <?php } else { ?>
    
    <a class="btn btn-primary" data-toggle="collapse" data-target="#addSubEvents<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon-plus"></i></a>
    <a class="btn btn-success" data-toggle="collapse" data-target="#editEvent<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon-pencil"></i></a>
    <a class="btn btn-danger" data-toggle="collapse" data-target="#deleteEvent<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>"><i class="icon-remove"></i></a>
          
    <?php }?>
    
    <br />
                                
        <div style="border: 0px !important; width: 50%;" class="accordion-group">
                
                <div class="collapse indent" id="listSubEvents<?php echo $main_event_id; ?>">
                                    
                                    <h4>List of Sub-Events</h4>
                                    <table align="center" class="table table-bordered" id="example">
                                    
                                    <thead>
                                    <th><strong>Sub-Event Title</strong></th>
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
                                    <td><h4>Edit Sub-Event Title</h4></td>
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
                                                $se_name = $_POST['se_name'];
                                                $sub_event_id = $_POST['sub_event_id'];
                                                $se_new_name = $_POST['se_new_name'];
                                              
                                                // Update sub_event
                                                $conn->query("UPDATE sub_event SET event_name='$se_new_name' WHERE subevent_id='$sub_event_id'");
                                                ?>
                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                    Swal.fire({
                                                        title: 'Success!',
                                                        text: 'Sub-Event title: <?php echo $se_name; ?> was changed to: <?php echo $se_new_name; ?> successfully!',
                                                        icon: 'success'
                                                    }).then(() => {
                                                        window.location = 'home.php';
                                                    });
                                                </script>
                                                <?php  
                                            } 
                                            ?>

                                    
                                    <br />
                                    
                                    <div id="deleteMEcollapse<?php echo $sub_event_row['subevent_id']; ?>" class="panel-collapse collapse">
                                    
                                    <div class="pull-right">
                                    
                                    <table class="table table-bordered">
                                    
                                    <tr>
                                    <td><h4>Delete Sub-Event</h4></td>
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
        Swal.fire({
            title: 'Success!',
            text: 'Sub-Event: <?php echo $se_name; ?> and its related data deleted successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'home.php';
            }
        });
        </script>
    <?php } else { ?>
        <script>
        Swal.fire({
            title: 'Error!',
            text: 'Bad Password! Try Again',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'home.php';
            }
        });
        </script>
    <?php } 
}
?>
   
   
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

   </td>
                                <tr>
                                    <td colspan="3">
                                    <div class="alert alert-warning">
                                    <h3>
                                    No data to display. Add Sub-Event <a href="#" data-toggle="collapse" data-target="#addSubEvents<?php echo $main_event_id; ?>" data-parent="#myGroup<?php echo $main_event_id; ?>"> here &raquo;</a>
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
    <h4>Add Sub-Events</h4>
    <table align="center" class="table table-bordered" id="example">
        <tr>
            <td>
                <form method="POST" enctype="multipart/form-data">
                    <input name="main_event_id" type="hidden" value="<?php echo $main_event_id; ?>" />
                    <strong>Banner</strong>:<br />
                    <input name="banner" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" type="file" required="true"/> 
                    <br />
                    <strong>Sub-Event Title</strong>:<br />
                    <input placeholder="Enter Sub-Event title" name="event_name" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" type="text" required="true"/> 
                    <br />
                    <strong>Date Start</strong>:<br />
                    <input name="event_date" class="form-control btn-block" min="<?php echo date('Y-m-d');?>" style="height: 30px !important;" type="date" required="true"/> 
                    <br />
                    <strong>Date End</strong>:<br />   
                    <input type="date" id="demo" min="<?php echo date('Y-m-d');?>" class="form-control btn-block" required="true">
                    <br/>
                    <strong>Time Start</strong>:<br />   
                    <input type="time" name="event_time_start" required="true" placeholder="hh:mm" class="form-control btn-block">
                    <br/>
                    <strong>Time End</strong>:<br />
                    <input type="time" name="event_time_end" required="true" placeholder="hh:mm" class="form-control btn-block">
                    <br/>
                    <strong>Venue</strong>:<br />
                    <textarea placeholder="Enter Sub-Event Venue" rows="2" name="event_place" class="form-control btn-block" style="text-indent: 7px !important;" required="true"></textarea>
                    <br />
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default"><i class="icon-ban-circle"></i> <strong>RESET</strong></button>
                        <button name="add_event" class="btn btn-primary"><i class="icon-ok"></i> <strong>SAVE</strong></button>
                    </div>
                </form>
            </td>
        </tr>
    </table>
</div>
        
<div class="collapse indent" id="editEvent<?php echo $main_event_id; ?>">
    <!-- Edit Event start -->
    <h4>Edit Event Details</h4>
    <table align="center" class="table table-bordered" id="example">
        <tr>
            <td>
                <form method="POST">
                    <?php   
                    $edit_event_query = $conn->query("SELECT * FROM main_event WHERE organizer_id='$session_id' AND mainevent_id='$main_event_id'") or die(mysql_error());
                    while ($edit_event_row = $edit_event_query->fetch()) {
                        $edit_mainevent_id = $edit_event_row['mainevent_id'];
                    ?>  
                        <input name="main_event_id" type="hidden" value="<?php echo $edit_mainevent_id; ?>" />
                        
                        <strong>Event Name:</strong><br /> 
                        <input type="text" name="main_event" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" placeholder="Event Name" required="true" value="<?php echo $edit_event_row['event_name']; ?>" />
                        <br /> 
                        
                        <strong>Date Start:</strong><br /> 
                        <input type="date" name="date_start" min="<?php echo date('Y-m-d');?>" class="form-control btn-block" style="height: 30px !important;" required="true" value="<?php echo $edit_event_row['date_start']; ?>"/>
                        <br /> 
                        
                        <strong>Date End:</strong><br /> 
                        <input type="date" name="date_end" min="<?php echo date('Y-m-d');?>" class="form-control btn-block" style="height: 30px !important;" required="true" value="<?php echo $edit_event_row['date_end']; ?>"/>
                        <br /> 

                        <strong>Time Start</strong>:<br />   
                        <input type="time" name="event_time_start" required="true" placeholder="hh:mm" class="form-control btn-block">
                        <br/>

                        <strong>Time End</strong>:<br />
                        <input type="time" name="event_time_end" required="true" placeholder="hh:mm" class="form-control btn-block">
                        <br/>
                        
                        <strong>Venue:</strong><br /> 
                        <textarea placeholder="Enter Venue" rows="2" name="place" class="form-control btn-block" style="text-indent: 7px !important;" required="true"><?php echo $edit_event_row['place']; ?></textarea>
                        
                    <?php } ?>
                    <div class="modal-footer">
                        <button name="edit_event" class="btn btn-success"><i class="icon-ok"></i> <strong>UPDATE</strong></button>
                    </div>
                </form>
            </td>
        </tr>
    </table>
    <!-- Edit Event end -->
</div>

        
<div class="collapse" id="deleteEvent<?php echo htmlspecialchars($main_event_id); ?>">
    <h4>Delete Event <i><?php echo htmlspecialchars($event_row['event_name']); ?></i>?</h4>

    <?php
    $place_query = $conn->prepare("SELECT * FROM sub_results WHERE mainevent_id = ?");
    $place_query->execute([$main_event_id]);

    if ($place_query->rowCount() == 0) { ?>
        <table align="center" class="table table-bordered" id="example">
            <tr>
                <td>
                    <form method="POST" action="delete_event.php">
                        <input name="main_event_id" type="hidden" value="<?php echo htmlspecialchars($main_event_id); ?>" />
                        <input name="ma_name" type="hidden" value="<?php echo htmlspecialchars($event_row['event_name']); ?>" />

                        <div class="modal-body">
                            <strong>Confirmation Password</strong>:<br />
                            <input placeholder="Enter Organizer's Password" name="entered_pass" class="form-control btn-block" style="text-indent: 7px !important; height: 30px !important;" type="password" required="true" />
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-danger" name="deleteEvent" type="submit"><i class="icon-trash"></i> <strong>DELETE</strong></button>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    <?php } else { ?>
        <div class="alert alert-warning">
            <h3>Cannot delete event. There are saved data for this event.</h3>
        </div>
    <?php } ?>
</div>

                
        </div>
        
    </div>
                                    </td></tr>
                            
                                    </table>
 
                                    </div>
                                          

                                    <!-- End of List of sub-events -->

                        </td></tr>
                        
                        <?php  } ?>
      
                        </table>
                                 
                        </div>
 
 </td></tr>
 
 
  <?php  }  ?>
 
  </table>
  <?php
if (isset($_POST['create'])) {
    $event_name = $_POST['main_event'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $event_place = $_POST['place'];
    $event_sy = $_POST['sy'];

    // Handle file upload
    $banner_name = '';
    if (isset($_FILES['banner']) && $_FILES['banner']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; // 5MB

        if (in_array($_FILES['banner']['type'], $allowed_types) && $_FILES['banner']['size'] <= $max_size) {
            $upload_dir = '../img/';
            $banner_name = uniqid() . '_' . $_FILES['banner']['name'];
            $banner_path = $upload_dir . $banner_name;

            if (move_uploaded_file($_FILES['banner']['tmp_name'], $banner_path)) {
                // File uploaded successfully
            } else {
                echo "Error uploading file.";
                exit;
            }
        } else {
            echo "Invalid file type or size.";
            exit;
        }
    }

    $org_query = $conn->query("SELECT * FROM main_event WHERE organizer_id='$session_id'") or die(mysql_error());
    $num_row = $org_query->rowCount();

    if ($num_row > 0) {
        $conn->query("INSERT INTO main_event(event_name, status, organizer_id, date_start, date_end, place, sy, banner)
                      VALUES('$event_name', 'deactivated', '$session_id', '$date_start', '$date_end', '$event_place', '$event_sy', '$banner_name')");
    } else {
        $conn->query("INSERT INTO main_event(event_name, status, organizer_id, date_start, date_end, place, sy, banner)
                      VALUES('$event_name', 'activated', '$session_id', '$date_start', '$date_end', '$event_place', '$event_sy', '$banner_name')");
    }
    ?>
    <script>
        Swal.fire({
            title: 'Success!',
            text: 'Event <?php echo $event_name; ?> successfully added...',
            icon: 'success'
        }).then(() => {
            window.location = 'home.php';
        });
    </script>
    <?php
}
?>


<?php 

if(isset($_POST['add_event']))
{
   $main_event_id = $_POST['main_event_id']; 
   $banner = $_FILES['banner']['name'];
   $target = "img/".basename($banner);
   $sub_event_name = $_POST['event_name'];  
   $event_date = $_POST['event_date']; 
   $event_time = $_POST['event_time']; 
   $event_place = $_POST['event_place']; 
  
  $conn->query("INSERT INTO sub_event(mainevent_id, event_name, status, eventdate, eventtime, place, organizer_id, banner)
  VALUES('$main_event_id', '$sub_event_name', 'activated', '$event_date', '$event_time', '$event_place', '$session_id', '$banner')");

  move_uploaded_file($_FILES['banner']['tmp_name'], $target);
  
  echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
  echo '<script type="text/javascript">
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Sub-Event ' . $sub_event_name . ' created successfully!",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "home.php";
            }
        });
        </script>';
}
?>


 <?php
if (isset($_POST['activation'])) {
    $status = $_POST['status'];
    $main_event_id = $_POST['main_event_id'];
    $check_pass2 = $_POST['check_pass'];
    $ma_name = $_POST['ma_name'];

    if ($check_pass == $check_pass2) {
        if ($status == "activated") {
            $conn->query("UPDATE main_event SET status='deactivated' WHERE mainevent_id='$main_event_id'");
            $conn->query("UPDATE sub_event SET status='deactivated' WHERE mainevent_id='$main_event_id'");
            $new_status = "deactivated";
        } else {
            $conn->query("UPDATE main_event SET status='activated' WHERE mainevent_id='$main_event_id'");
            $conn->query("UPDATE sub_event SET status='activated' WHERE mainevent_id='$main_event_id'"); // Add this line to update sub_events
            $new_status = "activated";
        }
        ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Event <?php echo htmlspecialchars($ma_name); ?> <?php echo $new_status; ?> successfully!',
                icon: 'success'
            }).then(() => {
                window.location = 'home.php';
            });
        </script>
        <?php
    } else {
        ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Confirmation did not match. Try again.',
                icon: 'error'
            }).then(() => {
                window.location = 'home.php';
            });
        </script>
        <?php
    }
}
?>

<?php 
if (isset($_POST['edit_event'])) {
    $main_event_id = $_POST['main_event_id'];
    $main_event_name = $_POST['main_event'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $event_time_start = $_POST['event_time_start'];
    $event_time_end = $_POST['event_time_end'];
    $place = $_POST['place'];

    // Validate time interval
    $start_time = new DateTime($event_time_start);
    $end_time = new DateTime($event_time_end);
    $interval = $start_time->diff($end_time);
    
    // Check if the interval is less than 30 minutes
    if ($interval->h < 0 || ($interval->h == 0 && $interval->i < 30)) {
        echo "<script>alert('The end time must be at least 30 minutes after the start time.');</script>";
    } else {
        // Update the event in the database
        $sql = "UPDATE main_event SET event_name='$main_event_name', date_start='$date_start', date_end='$date_end', event_time_start='$event_time_start', event_time_end='$event_time_end', place='$place' WHERE mainevent_id='$main_event_id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Event details updated successfully!',
                    icon: 'success'
                }).then(() => {
                    window.location = 'home.php';
                });
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>


<?php

?>
</div>
</section>
</div>
    </div>

    <?php include("footer.php") ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
    <script src="..//assets/js/jquery.js"></script>
    <script src="..//assets/js/bootstrap-transition.js"></script>
    <script src="..//assets/js/bootstrap-alert.js"></script>
    <script src="..//assets/js/bootstrap-modal.js"></script>
    <script src="..//assets/js/bootstrap-dropdown.js"></script>
    <script src="..//assets/js/bootstrap-scrollspy.js"></script>
    <script src="..//assets/js/bootstrap-tab.js"></script>
    <script src="..//assets/js/bootstrap-tooltip.js"></script>
    <script src="..//assets/js/bootstrap-popover.js"></script>
    <script src="..//assets/js/bootstrap-button.js"></script>
    <script src="..//assets/js/bootstrap-collapse.js"></script>
    <script src="..//assets/js/bootstrap-carousel.js"></script>
    <script src="..//assets/js/bootstrap-typeahead.js"></script>
    <script src="..//assets/js/bootstrap-affix.js"></script>
    <script src="..//assets/js/holder/holder.js"></script>
    <script src="..//assets/js/google-code-prettify/prettify.js"></script>
    <script src="..//assets/js/application.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                // Redirect to logout.php
                window.location.href = '..//index.php';
            }
        });
    });

    $('#toggle-btn').on('click', function() {
      $('#sidebar').toggleClass('collapsed');
      $('#main-content').toggleClass('collapsed');
      $(this).toggleClass('collapsed');
    });
    </script>
  </body>
</html>
