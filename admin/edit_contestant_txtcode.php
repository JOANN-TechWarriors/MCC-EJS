<!DOCTYPE html>
<html lang="en">
  
  <?php 
  include('header.php');
    include('session.php');
    
    
    $sub_event_id=$_GET['sub_event_id'];
    $se_name=$_GET['se_name'];
    $contestant_id=$_GET['contestant_id'];
     
  ?>
  
  <body>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
       
            
        </div>
      </div>
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
  
  <div class="main" id="main-content">
    <div class="container">
      <h1><?php echo $se_name; ?> Settings</h1>
    </div>

<div class="span12">



                <br />
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    
                        <li><a href="selection.php">Dashboard</a></li>
                    
                        <li><a href="home.php">List of Events</a></li>
                        
                        <li><a href="sub_event_details_edit.php?sub_event_id=<?php echo $sub_event_id; ?>&se_name=<?php echo $se_name; ?>"><?php echo $se_name; ?> Settings</a></li>
                        
                        <li>Edit Contestant</li>
                        
                    </ul>
                </div>
                

   <form method="POST">
    <input value="<?php echo $sub_event_id; ?>" name="sub_event_id" type="hidden" />
 <input value="<?php echo $se_name; ?>" name="se_name" type="hidden" />
 <input value="<?php echo $contestant_id; ?>" name="contestant_id" type="hidden" />
 
  <?php    
   	$cont_query = $conn->query("SELECT * FROM contestants WHERE contestant_id='$contestant_id'") or die(mysql_error());
    while ($cont_row = $cont_query->fetch()) 
        { ?> 
 
 
 
 <table align="center" style="width: 30% !important;">
 <tr>
 <td>
 

 <div style="width: 100% !important;" class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Edit Contestant</h3>
            </div>
 
 


 
     <div class="panel-body">
  
   <table align="center">
  
  
 
   <tr>
 
   <td>
    <strong>Contestant Name</strong>
     <br />
   <input name="txt_code" type="text" class="form-control" placeholder="Contestant Name" value="<?php echo $cont_row['txt_code']; ?>" />
        </td>
   <td>
    <strong>Contestant Category</strong>
     <br />
   <input name="txt_code" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $cont_row['txt_code']; ?>" />
  </td>
   
   </tr>

  <tr>
  <td >&nbsp;</td>
  </tr>
  <tr>
  <td align="right"><a href="sub_event_details_edit.php?sub_event_id=<?php echo $sub_event_id;?>&se_name=<?php echo $se_name;?>" class="btn btn-default">Back</a>&nbsp;<button name="edit_contestant" class="btn btn-success">Update</button></td>
  </tr>
  </table>
 
</div>
 
          </div>
  </td>
 </tr>
 </table>  
  <?php } ?> 
  
</form>

</div>

</div>       
          
<?php 
if (isset($_POST['edit_contestant'])) {
    $se_name = $_POST['se_name'];
    $sub_event_id = $_POST['sub_event_id'];
    $contestant_id = $_POST['contestant_id'];
    $txt_code = $_POST['txt_code'];
  
    $ssquery = $conn->query("SELECT * FROM contestants WHERE txt_code='$txt_code'") or die(mysql_error());
    $ssnum_row = $ssquery->rowCount();
    if ($ssnum_row > 0) {
?>
<script>
  window.location = 'sub_event_details_edit.php?sub_event_id=<?php echo $sub_event_id; ?>&se_name=<?php echo $se_name; ?>';
  alert('Textcode: <?php echo $txt_code ?> already exists, try another. . . Thanks.');
</script>
<?php 
    } else {
        $conn->query("UPDATE contestants SET txt_code='$txt_code' WHERE contestant_id='$contestant_id'");  
?>
<script>
  window.location = 'sub_event_details_edit.php?sub_event_id=<?php echo $sub_event_id; ?>&se_name=<?php echo $se_name; ?>';
  alert('Textcode updated successfully!');
</script>
<?php  
    } 
} 
?>

<?php include('footer.php'); ?>
<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

<script>
    document.getElementById("toggle-btn").addEventListener("click", function () {
        var sidebar = document.getElementById("sidebar");
        var mainContent = document.getElementById("main-content");

        sidebar.classList.toggle("collapsed");
        mainContent.classList.toggle("collapsed");

        var isCollapsed = sidebar.classList.contains("collapsed");
        this.innerHTML = isCollapsed ? "☰" : "☰";
    });
</script>

</body>
</html>
