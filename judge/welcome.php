 

<!DOCTYPE html>
<html lang="en">
  
  <?php
  include('header2.php');

  ?>

<style>
  .alert {
  font-size: 14px;
  padding: 8px 12px;
  text-align: center;
  margin: 10px;
  max-width: 600px;
  position: fixed;
  top: 40px;
  right: 20px;
  z-index: 9999;
}

.logo-small {
  width: 300px; /* Adjust the width as needed */
  height: auto; /* Maintain aspect ratio */
  margin-top: 100px; /* Add space below the logo */
}

.motto {
  margin-top: 20px; /* Add space above the motto */
  margin-right: 100px; /* Add space to the left */
}

.form-container {
  width: 400%; /* Adjust the width as needed */
  max-width: 600px;
  margin: 2 auto;
}

thead th {
  background-color: aquamarine;
  text-indent: 10px;
  font-size: 14px; /* Adjust the font size as needed */
  padding: 10px; /* Adjust the padding as needed */
}
</style>

  <body id="login" style="background:url(../img/Community-College-Madridejos.jpeg)">

  <div class="span6">
        <div class="title_index">

              <div class="row-fluid">
                <div class="span12"></div>
                    <div class="row-fluid">
                      <div class="span10">
                      <img class="index_logo logo-small" src="../img/logo.png">
                      </div>  
                      <div class="span12">
                        <div class="motto">
                        
                        <h3><p>WELCOME&nbsp;&nbsp;TO:</p></h3>
                        <h2><p><strong>MCC Event Judging System</strong></p></h2>                      
                        </div>                      
                      </div>              
                    </div>                    
              </div>  
            
        </div>
      </div>
   
        
        <table cellpadding="10" cellspacing="0" border="0" align="center">
        <thead>
 <th align="left" style="background-color: aquamarine; text-indent: 10px; color: black; "><h4> &nbsp;WELCOME</h4></th>
 </thead>

 <tr style="background-color: #fff;">
 
 <td>
 
 
  <h5><i class="icon-user"></i>  JUDGE:</h5>

 
<div id="myGroup" >

<div class="input-group">
       <div class="alert alert-success">
      <form method="POST" action="judge_panel.php" >
            <h4>Judge's Code</h4>
            <br />
          <input id="myInputJC" style="font-size: large; height: 45px !important;" class="form-control btn-block" name="judge_code" type="password" placeholder="Enter Judge's Code" />
          <button style="width: 160px !important;" type="submit" class="btn btn-primary pull-right"><i class="icon-ok"></i> <strong>ENTER</strong></button>
  
            <p><input style="padding-top: 0px !important; margin-top: 0px !important;" type="checkbox" onclick="myFunctionJC()"/> <strong>Show Code</strong></p>
                                     
                                    <script>
                                    function myFunctionJC() {
                                        var x = document.getElementById("myInputJC");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                    </script>
 </table>
        </div>
      </div>
    </div><br><br>
    <!--end About judge button -->


<!--<h5><i class="icon-user"></i>  USER:</h5>
  <button style="width: 160px !important;" type="submit" class="btn btn-primary pull-right"><i class="icon-ok"></i> <strong>START</strong></button>

        </table>
              

    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
      
        <font size="2" class="" align="center"><strong>Event Judging System &middot; 2022 &COPY; </strong></font> <br />
        
      </div>
    </footer>


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
    
  </body>
</html>