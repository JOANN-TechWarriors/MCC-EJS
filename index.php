<?php 
include('dbcon.php');
date_default_timezone_set('Asia/Manila'); 
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('header2.php');
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

  .container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-top: 50px;
  }

  .welcome-text {
    font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
  }

  .login-form {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .login-form table {
    background-color: #d7def2;
    padding: 20px;
    border-radius: 8px;
  }

  .login-form h4 {
    background-color: #4976f5;
    color: white;
    padding: 10px;
    border-radius: 8px 8px 0 0;
    margin: 0;
  }

  .login-form input {
    font-size: large;
    height: 35px !important;
    text-indent: 7px !important;
  }

  .login-form button {
    width: 160px !important;
  }
</style>

<body>
  <!-- Navbar ================================================== -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
      </div>
    </div>
  </div>
  <!-- Subhead ================================================== -->
  <header class="jumbotron subhead" id="overview">
    <div class="container">
      <h1>MCC Event Judging System</h1>
      <p class="lead">Ready to serve you...</p>
    </div>
  </header>

  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="welcome-text">
      Welcome to MCC Event Judging System
    </div>
    <div class="login-form">
      <form method="POST" action="login.php">
        <table cellpadding="10" cellspacing="0" border="0" align="center">
          <thead>
            <tr>
              <th align="left" style="background-color: #4976f5; text-indent: 7px; color: white;">
                <h4> &nbsp;ORGANIZER LOGIN</h4>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <h5><i class="icon-user"></i> USERNAME:</h5>
                <input class="form-control btn-block" type="text" name="username" placeholder="Username" required="true" autofocus="true" />
                <h5><i class="icon-lock"></i> PASSWORD:</h5>
                <input class="form-control btn-block" type="password" name="password" placeholder="Password" required="true" autofocus="true" />
                <br />
                <strong><a data-toggle="modal" data-target="#forgot-password-modal">Forgot password?</a></strong>
                <br />
                <h6>if you have no account, pls</h6>
                <button type="submit" class="btn btn-primary pull-right"><i class="icon-ok"></i> <strong>LOGIN</strong></button>
                <strong>Register <a href="create_account.php">here &raquo;</a></strong> &nbsp;&nbsp;&nbsp;
                <br><br>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>

  <div class="modal fade" id="forgot-password-modal" tabindex="-1" role="dialog" aria-labelledby="forgot-password-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="forgot-password-modal-label">Forgot Password?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearEmail()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="forgot_password.php" method="post" autocomplete="off">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="send" onclick="clearEmail()">Reset Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="display: none;">
    <div class="toast-header">
      <strong class="toast-title">Title</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Body
    </div>
  </div>

  <!-- Footer ================================================== -->
  <footer class="footer">
    <div class="container">
      <font size="2" class="" align="center"><strong>Event Judging System &middot; 2023 &COPY; </strong></font>
      <br />
    </div>
  </footer>

  <!-- Le javascript ================================================== -->
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
    window.uni_modal = function($title = '', $url = '', $size = "") {
      start_load()
      $.ajax({
        url: $url,
        error: err => {
          console.log()
          alert("An error occured")
        },
        success: function(resp) {
          if (resp) {
            $('#uni_modal .modal-title').html($title)
            $('#uni_modal .modal-body').html(resp)
            if ($size != '') {
              $('#uni_modal .modal-dialog').addClass($size)
            } else {
              $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
            }
            $('#uni_modal').modal({
              show: true,
              backdrop: 'static',
              keyboard: false,
              focus: true
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
    setTimeout(function() {
      var alert = document.querySelector('.alert');
      if (alert) {
        alert.style.display = 'none';
      }
    }, 3000);
  </script>
</body>
</html>
