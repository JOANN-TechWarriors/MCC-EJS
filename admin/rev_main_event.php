 

<!DOCTYPE html>
<html lang="en">
  
  <?php 
  include('header2.php');
    include('session.php');
 
  ?>
  <head><style>
    
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
        .content {
      margin-left: 260px;
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
        <li><a href="..//index.php">LOGOUT</a></li>
    </ul>
  </div>
    
   <!-- Subhead
================================================== -->
<div class="main"> 
  <div class="container">
    <h1>Data Reviews</h1>
  </div>
    
    <br />
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    
                    <li>
                <a href="dashboard.php">Dashboard</a> /
              </li>

                    
                        <li><a href="home.php">Ongoing Events</a> / </li>
                        <li><a href="upcoming_events.php">Upcoming Events</a> / </li>
                        <li>
                <a href="score_sheets.php">Score Sheets</a> /
              </li>
              
                <li>Data Reviews</li>
            
                        
                    </ul>
                </div>
                
    <div class="col-lg-1">
   </div>
    <div class="col-lg-10">
    
    <form method="POST" target="_self" action="review_search.php">
    
     <input style="font-size: large; height: 45px !important; text-indent: 7px !important;" class="form-control btn-block" name="txtsearch" placeholder="Enter a keyword and search..." />  
     <br />
      <button class="btn btn-info pull-right" style="width: 150px !important;"><i class="icon-search"></i> <strong>SEARCH</strong></button> 
     
      </form>
   </div>
   <div class="col-lg-1">
   </div>
 
   <div class="col-lg-3">
   </div>
   <div class="col-lg-6">
 <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Select Main Event</h3>
            </div>
  
     <div class="panel-body">
  <form method="POST" action="rev_sub_event.php">
  <table class="table table-bordered">
  <thead>
  <th></th>
   <th>Event Name</th>
    <th colspan="2"><center>Action</center></th>
  </thead>
  
  
  <tbody>
   <?php    
   	$mainevent_query = $conn->query("SELECT * FROM main_event") or die(mysql_error());
    while ($mainevent_row = $mainevent_query->fetch()) 
        { ?>
  <tr>
  <td width="10" align="center"><input type="radio" name="main_event_id" value="<?php echo $mainevent_row['mainevent_id']; ?>" required="true" /></td>
  <td> <?php echo $mainevent_row['event_name']; ?></td>
  
  <td width="10">
  <a target="_blank" title="click to print summary result" href="summary_results.php?main_event_id=<?php echo $mainevent_row['mainevent_id']; ?>" class="btn btn-warning"><i class="icon-list"></i></a>
  </td>
  
  <td width="10"> 
  <a target="_blank" title="click to print event result" href="print_all_results.php?main_event_id=<?php echo $mainevent_row['mainevent_id']; ?>" class="btn btn-info"><i class="icon-print"></i></a>
  </td>
  
  </tr>
  <?php } ?>
  <tr>
  <td colspan="4">
  <?php if($mainevent_query->rowCount()>0){ ?>
    <button class="btn btn-info pull-right" style="width: 200px !important;"><strong>NEXT</strong> <i class="icon-chevron-right"></i></button></td>
  
  <?php }else{ ?>
    <div class="alert alert-warning">
    
    <h3>NO EVENTS TO DISPLAY... PLEASE ADD AN EVENT <a href="home.php">HERE &raquo;</a></h3>
    
    </div>
  <?php } ?>
   
  </tr>
  </tbody>
  </table>
 </form>
</div>
 
          </div>
          
        
  </div>
  
 <div class="col-lg-3">
   </div>
 
 
          </div>
 
  </div>
     
    
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
    
  </body>
</html>
