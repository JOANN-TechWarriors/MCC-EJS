 

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

  <body>
   
  
<div class="container">
    <div class="row-fluid">

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
      
      <div class="span6">
        <div class="pull-left">
                <div id="home" >
        <div class="overlay">
          <div class="form-container">
            <form id="login-form" method="POST" action="login.php" >
             <br /> 
             <br/>
             <br/> 
             <table cellpadding="50" cellspacing="40"  align="center">

        <thead>
       <th align="left" style="background-color: aquamarine; text-indent: 10px; color: black; "><h4> &nbsp;WELCOME</h4></th>
       </thead>

         <tr style="background-color: #fff;">
 
             <td>
              <h5><i class="icon-user"></i>  JUDGE'S CODE:</h5>
              <input style="font-size: large; height: 35px !important; text-indent: 7px !important;" class="form-control btn-block" type="text" name="username" placeholder="Username" required="true" autofocus="true" />
              <button id="login-button" style="width: 100px !important;" type="button" class="btn btn-primary pull-right"><i class="icon-ok"></i> <strong>ENTER</strong></button>
             
             </td>
             </tr>
             </table>
             </form>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
   
   
    <!--end About judge button -->
    ================================================== -->
    <footer class="footer">
      <div class="container">
      
        <font size="2" class="" align="center"><strong>MCC Event Judging System &middot; 2024 &COPY; </strong></font> <br />
        
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

    <script>
window.onload = function() {
    <?php if(isset($_SESSION['login_success']) && $_SESSION['login_success'] == true): ?>
        Swal.fire({
            title: "Success!",
            text: "You are Successfully enter!",
            icon: "success"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "judge_panel.php";
            }
        });
        <?php unset($_SESSION['enter_success']); ?>
    <?php endif; ?>
};

window.uni_modal = function($title = '' , $url='',$size=""){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occurred")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal({
                  show:true,
                  backdrop:'static',
                  keyboard:false,
                  focus:true
                })
                end_load()
            }
        }
    })
}

function clearEmail() {
    document.getElementById("forgot-password-form").reset();
}

// Hide the alert after 3 seconds
setTimeout(function(){
    var alert = document.querySelector('.alert');
    if (alert) {
        alert.style.display = 'none';
    }
}, 3000);

document.getElementById("login-button").addEventListener("click", function() {
    Swal.fire({
        title: "Success!",
        text: "You are successfully enter!",
        icon: "success",
        confirmButtonText: "Ok",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("login-form").submit();
        }
    });
});
</script>
    
  </body>
</html>