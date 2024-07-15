<!DOCTYPE html>
<html lang="en">
   
   <?php
   include('header2.php');
    include('session.php');
    ?>
<head>
<style>
  body {
            font-family: Arial, sans-serif;
            background-color: #fff;
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

       
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

button.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
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
    <h1>Score Sheets</h1>
      </div>

      <div class="span15">
                <br />
                <div class="col-md-15">
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a> /
                        </li>
                        <li>
                            <a href="home.php">Ongoing Events</a> /
                        </li>
                        <li>
                            <a href="upcoming_events.php">Upcoming Events</a> /
                        </li>
                        <li>Score Sheets</li>
                    </ul>
                </div>
            </div>
       
      
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
        </br  >
        <hr />  
        
        </div>
          
       
        
        
        </td>
      </tr>
        
        
        <?php } ?>     
          
         </table>
        
        </section>
 
 
      </div>
    </div>

  </div>
 

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
    </script>
 

  </body>
</html>