<!DOCTYPE html>
<html lang="en">

<?php 
include('header.php');
include('session.php');
?>

<body>


<div class="container">
  <div class="col-lg-3"></div>
  <div class="col-lg-6">
    <a href="edit_organizer.php" class="btn btn-primary"><strong>ORGANIZER SETTINGS &raquo;</strong></a>
    <hr />

    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title"><strong>Tabulator Settings Panel</strong></h3>
      </div>
      <div class="panel-body">
        <form method="POST" enctype="multipart/form-data"> 
          <?php 
          $query = $conn->query("SELECT * FROM organizer WHERE org_id='$session_id'") or die(mysql_error());
          
          if ($query->rowCount() > 0) {
            $row = $query->fetch();
          ?>
          <table align="center">
            <tr><td colspan="5"><strong>Basic Information</strong><hr /></td></tr>
            <tr>
              <td>Firstname:
                <input type="text" name="fname" class="form-control" placeholder="Firstname" value="<?php echo $row['fname']; ?>" required autofocus>
              </td>
              <td>&nbsp;</td>
              <td>Middlename:
                <input type="text" name="mname" class="form-control" placeholder="Middlename" value="<?php echo $row['mname']; ?>" required>
              </td>
              <td>&nbsp;</td>
              <td>Lastname:
                <input type="text" name="lname" class="form-control" placeholder="Lastname" value="<?php echo $row['lname']; ?>" required>
              </td>
            </tr>
            <tr><td colspan="5">&nbsp;</td></tr>
            <tr><td colspan="5"><strong>Account Security</strong><hr /></td></tr>
            <tr>
              <td>Username:
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>" required>
              </td>
              <td>&nbsp;</td>
              <td>New Password:
                <input id="password" type="password" name="passwordx" class="form-control" placeholder="Password">
              </td>
              <td>&nbsp;</td>
              <td>Re-type Password:
                <input id="confirm_password" type="password" name="password2x" class="form-control" placeholder="Re-type Password">
              </td>
            </tr>
            <tr>
              <td colspan="4"></td>
              <td><span id='message'></span></td>
            </tr>
            <tr><td colspan="5">&nbsp;</td></tr>
            <tr><td colspan="5"><strong>Confirmation</strong><hr /></td></tr>
            <tr>
              <td colspan="5">Tabulator Current Password:
                <input type="password" name="tab_password" class="form-control" placeholder="Tabulator Current Password" required>
              </td>
            </tr>
            <tr><td colspan="5">&nbsp;</td></tr>
            <tr>
              <td colspan="5">Organizer Current Password:
                <input type="password" name="org_password" class="form-control" placeholder="Organizer Current Password" required>
              </td>
            </tr>
          </table>
          <div class="col-lg-12">
            <hr />
            <div class="btn-group pull-right">
              <button name="update" type="submit" class="btn btn-success">Update</button>
              <a href="dashboard.php" type="button" class="btn btn-default">Cancel</a>
            </div>
          </div> 
          <?php } else { ?>
          <form method="POST">
            <table align="center">
              <tr><td colspan="5"><strong>Basic Information</strong><hr /></td></tr>
              <tr>
                <td>Firstname:
                  <input type="text" name="fname" class="form-control" placeholder="Firstname" required>
                </td>
                <td>&nbsp;</td>
                <td>Middlename:
                  <input type="text" name="mname" class="form-control" placeholder="Middlename" required>
                </td>
                <td>&nbsp;</td>
                <td>Lastname:
                  <input type="text" name="lname" class="form-control" placeholder="Lastname" required>
                </td>
              </tr>
              <tr><td colspan="5">&nbsp;</td></tr>
              <tr><td colspan="5"><strong>Account Security</strong><hr /></td></tr>
              <tr>
                <td>Username:
                  <input type="text" name="username" class="form-control" placeholder="Username" required>
                </td>
                <td>&nbsp;</td>
                <td>Password:
                  <input id="password" type="password" name="passwordx" class="form-control" placeholder="Password" required>
                </td>
                <td>&nbsp;</td>
                <td>Re-type Password:
                  <input id="confirm_password" type="password" name="password2" class="form-control" placeholder="Re-type Password" required>
                </td>
              </tr>
              <tr>
                <td colspan="4"></td>
                <td><span id='message'></span></td>
              </tr> 
              <tr><td colspan="5">&nbsp;</td></tr>
              <tr><td colspan="5"><strong>Confirmation</strong><hr /></td></tr>
              <tr>
                <td colspan="5">Organizer Password:
                  <input type="password" name="org_password" class="form-control" placeholder="Password" required>
                </td>
              </tr>
            </table>
            <br />
            <div class="btn-group pull-right">
            <button name="add_tabulator" type="submit" class="btn btn-primary">ADD</button>
              <a href="edit_organizer.php" type="button" class="btn btn-default">CANCEL</a>
              
            </div>
          </form>
          <?php } ?>
        </form>
      </div><!-- end panel body -->
    </div> <!-- end panel -->
  </div><!-- end col-6 -->
  <div class="col-lg-3"></div>
</div> <!-- end container -->

<?php include('footer.php'); ?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="..//javascript/jquery1102.min.js"></script>
<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else {
    $('#message').html('Not Matching').css('color', 'red');
  }
});
</script>
</body>
</html>
<?php

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['passwordx'];
    $confirm_password = $_POST['password2x'];
    $tab_password = $_POST['tab_password'];
    $org_password = $_POST['org_password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "<script>alert('Password and Confirm Password do not match.');</script>";
        exit();
    }

    // Check if the organizer's password is correct
    $org_query = $conn->query("SELECT * FROM organizer WHERE password='$org_password' AND access='Organizer'");
    $org_num_row = $org_query->rowCount();
    if ($org_num_row <= 0) {
        echo "<script>alert('Incorrect Organizer Password.');</script>";
        exit();
    }

    // Update the tabulator's information
    $update_query = "UPDATE organizer SET fname='$fname', mname='$mname', lname='$lname', username='$username'";
    if (!empty($password)) {
        $update_query .= ", password='$password'";
    }
    $update_query .= " WHERE org_id='$session_id'";

    $conn->query($update_query);

    echo "<script>
        alert('Tabulator information successfully updated.');
        window.location = 'edit_tabulator.php';
    </script>";
}

?>
