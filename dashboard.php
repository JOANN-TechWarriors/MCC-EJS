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
            top: 100;
            left: 100;
            height: 100%;
            width: 250px;
            background-color: #333;
            color: #fff;
            padding-top: 60px; /* Adjusted to match the height of the navbar */
            overflow-y: auto; /* Enable scrolling if content exceeds height */
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
            margin-left: 250px; /* Adjusted to match the width of the sidebar */
            padding: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%; /* Full width on small screens */
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
            <!-- <li class="dropdown"> -->
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <!-- <a class="navbar-brand" href="#">MCC Event Judging System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item active">
                            <a class="nav-link" href="home.php"><strong>ONGOING EVENTS</strong></a> -->
                        <!-- </li>
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
                            </div> -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page content -->
        <!-- <div class="container-fluid">
            <header class="jumbotron subhead" id="overview"> -->
                <!-- <div class="container">
                    <h1>Dashboard</h1>
                    
                </div> -->
            <!-- </header> -->
                   <h1>Dashboard</h1>
            <!-- Event Cards -->
            <br>
            <br>
            <br>
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
            <!-- End Event Cards -->

        </div><!-- /.container-fluid -->
    </div><!-- /.main -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>




<?php ?>

  <!--<div class="container">

   
    <div class="row">
      
      <div class="span12">
      
      
      <br />
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    
                        <li><a href="selection.php">Dashboard</a> / </li>
                    
                        <li><a href="home.php">List of Events</a> / </li>
                        
                        <li>Score Sheets</li>
                        
                    </ul>
                </div>
                
                
        <section id="download-bootstrap">
 
       <table align="center">
       
      
<?php
    
$sy_query = $conn->query("select * FROM main_event where organizer_id='$session_id' AND status='activated'") or die(mysql_error());
while ($sy_row = $sy_query->fetch()) 
{ ?>

<tr>
<td>
       
<?php 
 
$sy=$sy_row['sy'];
$MEidxxx=$sy_row['mainevent_id'];
  
          $event_query = $conn->query("select * from main_event where mainevent_id='$MEidxxx' AND status='activated'") or die(mysql_error());
		while ($event_row = $event_query->fetch()) 
        { ?>
       
           <button class="accordion"><strong><?php echo $event_row['event_name']; ?></strong></button> 
              <?php }   ?>
              
         <div class="panel">
         
         
         <table class="table table-striped">
          
          <thead>
        <th>Event Name</th>
        
        <th>View Score Sheet - Select Judge</th>
          </thead>
          
          <tbody>
         <?php   
          $s_event_query = $conn->query("select * from sub_event where mainevent_id='$MEidxxx'") or die(mysql_error());
		while ($s_event_row = $s_event_query->fetch()) 
        { 
            $se_id=$s_event_row['subevent_id'];
            ?>
     <tr>
     <td>
     <div class="nav-collapse collapse">
     <ul class="nav">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><strong><?php echo $s_event_row['event_name']; ?></strong> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  
                  <li>
                  <a title="Go to live viewing of this Sub-Event scores." target="_blank" href="updateview.php?sid=<?php echo $se_id; ?>">Live View</a> 
                  </li>
                  
                  
                  <?php if($s_event_row['txtpoll_status']=="active")
                  {?>
                  
                  <li>
                  <a title="Go to live viewing of this Sub-Event Text Poll." target="_blank" href="updateBlankTxtview.php?sid=<?php echo $se_id; ?>">Text Poll Live View</a> 
                  </li>
                  
                  
                  <li>
                  <a title="Go to live viewing of this Sub-Event Text Poll Data." target="_blank" href="txt_pollData.php?sid=<?php echo $se_id; ?>">TP - Text Code</a> 
                  </li>
                  
                  <?php } ?>
                  
                  
                  
                  
                  </ul>
               
     </ul>
     </div>
     </td>
     <td>
 
     <?php   
          $judge_query = $conn->query("select * from judges where subevent_id='$se_id' order by judge_ctr") or die(mysql_error());
		while ($judge_row = $judge_query->fetch()) 
        { ?>
     
     <a style="margin-top: 4px !important;" title="click to rank contestant score's for this judge" target="_blank" href="view_score_sheet.php?event_id=<?php echo $se_id ; ?>&judge_id=<?php echo $judge_row['judge_id']; ?>" class="btn btn-info"><i class="icon icon-tasks"></i> <?php echo $judge_row['judge_ctr']; ?>. <?php echo $judge_row['fullname']; ?></a>
      <?php } ?>
 
     </td>
     
     <td width="128">
        <a title="click to set points deductions" target="_blank" href="deductScores.php?event_id=<?php echo $se_id ; ?>" class="btn btn-danger"><i class="icon icon-minus-sign"></i></a>

        <a title="click to set final result for this sub-event" target="_blank" href="result_title.php?event_id=<?php echo $se_id ; ?>" class="btn btn-primary"><i class="icon icon-star"></i></a>
        
        <a title="click to print results" target="_blank" href="result_sheet.php?event_id=<?php echo $se_id ; ?>" class="btn btn-primary"><i class="icon icon-print"></i></a>
 
     </td>
     
     </tr>
     <?php } ?>
     
     
            </tbody>
     
          </table>
          <br / >
        <hr />  
        
        </div>
          
       
        
        
        </td>
      </tr>-->
        
        
        <!--<?php } ?>     
          
         </table>
        
        </section>
 
 
      </div>
    </div>

  </div>-->


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
      }

      // Output a success message
      echo '<div class="alert alert-success" role="alert">Push notification sent successfully for upcoming events.</div>';
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
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
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


    <!-- <script src="assets/js/bootstrap-popper.js"></script> -->

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>
    <script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
      acc[i].onclick = function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      }
    }

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