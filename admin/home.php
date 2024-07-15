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
            
              
                </ul>
            </li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="main">
        
            <div class="container">
                    <h1>Ongoing Events</h1>
                    
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
                            
                           
                            
                            <div id="addMEcollapse" class="collapse">   
    <form method="POST">
        <table align="center" class="table table-bordered cp" id="example">
            <thead>
                <th>
                    <h4><strong>ADD MAIN EVENT</strong>
                        <button type="button" class="btn btn-default pull-right" data-toggle="collapse" data-target="#addMEcollapse" title="Click to add Main Event"><i class="icon-remove"></i> CANCEL</button>
                    </h4>
                </th>
            </thead>
            <tr>
                <td>
                    <strong>Event #:</strong><br />
                    <input name="sy" class="form-control btn-block" style="text-indent: 5px !important; height: 30px !important;" type="number" placeholder="0" required="true"/>
                    <br /> 
                    <strong>Event Name:</strong><br />
                    <input type="text" name="main_event" class="form-control btn-block" style="text-indent: 5px !important; height: 30px !important;" placeholder="Event Name" required="true"/>
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

<button style="margin-bottom: 20px !important;" class="btn btn-info pull-right" data-toggle="collapse" data-target="#addMEcollapse" title="Click to add Main Event"><i class="icon icon-plus" float="center"></i> <strong>MAIN EVENT</strong></button> 


                
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
                        
      
                        </table>
                                 
                        </div>
 
 </td>
 </tr>
 
 
 
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
  <!-- Include jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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


