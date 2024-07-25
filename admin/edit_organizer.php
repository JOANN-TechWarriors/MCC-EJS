<!DOCTYPE html>
<html lang="en">
    <?php 
    include('header.php');
    include('session.php');
    ?>

  <body>



    <div class="container">
      <div class="col-lg-12">
        <a href="edit_tabulator.php" class="btn btn-danger"><strong>TABULATOR SETTINGS &raquo;</strong></a>  
        <hr />
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Organizer Settings Panel</strong></h3>
          </div>
          <div class="panel-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="col-lg-6">
              <?php 
$query = $conn->query("SELECT * FROM organizer WHERE organizer_id='$session_id'");

if ($query) {
    $row = $query->fetch();
    if ($row) { 
?>
        <table align="center">
            <tr>
                <td colspan="5"><strong>Basic Information</strong><hr /></td>
            </tr>
            <tr>
                <td>Firstname: <input type="text" name="fname" class="form-control" placeholder="Firstname" value="<?php echo $row['fname']; ?>" required autofocus></td>
                <td>&nbsp;</td>
                <td>Middlename: <input type="text" name="mname" class="form-control" placeholder="Middlename" value="<?php echo $row['mname']; ?>" required></td>
                <td>&nbsp;</td>
                <td>Lastname: <input type="text" name="lname" class="form-control" placeholder="Lastname" value="<?php echo $row['lname']; ?>" required></td>
            </tr>
            <tr><td colspan="5">&nbsp;</td></tr>
            <tr>
                <td>Email: <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['email']; ?>" required></td>
                <td>&nbsp;</td>
                <td>Phone Number: <input type="text" name="pnum" class="form-control" placeholder="Phone Number" value="<?php echo $row['pnum']; ?>" required></td>
                <td>&nbsp;</td>
                <td>Textpoll Number: <input type="text" name="tpnum" class="form-control" placeholder="Textpoll Number" value="<?php echo $row['txt_poll_num']; ?>" required></td>
            </tr>
            <tr><td colspan="5">&nbsp;</td></tr>
            <tr><td colspan="5"><strong>Company Information</strong><hr /></td></tr>
            <tr>
                <td colspan="5">Company Name: <input type="text" name="cname" class="form-control" placeholder="Company Name" value="<?php echo $row['company_name']; ?>" required></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td colspan="5">Company Address: <input type="text" name="caddress" class="form-control" placeholder="Company Address" value="<?php echo $row['company_address']; ?>" required></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td>Telephone: <input type="text" name="ctelephone" class="form-control" placeholder="Company Telephone" value="<?php echo $row['company_telephone']; ?>" required></td>
                <td>&nbsp;</td>
                <td>Email: <input type="text" name="cemail" class="form-control" placeholder="Company Email" value="<?php echo $row['company_email']; ?>" required></td>
                <td>&nbsp;</td>
                <td>Website: <input type="text" name="cwebsite" class="form-control" placeholder="Company Website" value="<?php echo $row['company_website']; ?>" required></td>
            </tr>
        </table>
<?php 
    } else {
        echo "<p>No organizer found with the given ID.</p>";
    }
} else {
    echo "<p>Error executing query: " . $conn->error . "</p>";
}
?>

                </table>
              </div>
              <div class="col-lg-6">
                <table align="center">
                  <tr><td colspan="5">&nbsp; <hr /></td></tr>
                  <tr>
               <td colspan="2">
               <br /> 
               <img class="thumbnail" src="../img/<?php echo $row['company_logo']; ?>" width="120" height="100" />
    
               </td>
               <td colspan="3">
               Upload Company Logo:<br /><br />
               <input type="file" name="file" id="img" /></td>
               </tr>
   
                  <tr><td colspan="5">&nbsp;</td></tr>
                  <tr><td colspan="5"><strong>Account Security</strong><hr /></td></tr>
                  <tr>
                    <td>Username: <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>" required></td>
                    <td>&nbsp;</td>
                    <td>Password: <input id="password" type="password" name="passwordx" class="form-control" placeholder="Password" value="<?php echo $row['password']; ?>" required></td>
                    <td>&nbsp;</td>
                    <td>Re-type Password: <input id="confirm_password" type="password" name="password2x" class="form-control" placeholder="Re-type Password" value="<?php echo $row['password']; ?>" required></td>
                  </tr>
                  <tr><td colspan="4"></td><td><span id='message'></span></td></tr>
                  <tr><td colspan="5"><strong>Confirmation</strong><hr /></td></tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Current Password: <input type="password" name="current_password" class="form-control" placeholder="Password" required /></td>
                  </tr>
                </table>
              </div>
              <div class="col-lg-12">
                <hr />
                <div class="btn-group pull-right">
                <button name="update" type="submit" class="btn btn-success">Update</button>
                  <a href="home.php" type="button" class="btn btn-default">Cancel</a>
                </div>
              </div>
            </form>
          </div><!-- end panel body -->
        </div> <!-- end panel -->
      </div><!-- end col-12 -->
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


<?php 
if(isset($_POST['update'])) {
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder="img/";
    $new_file_name = strtolower($file);
    $final_file = str_replace(' ','-',$new_file_name);

    $cname = $_POST['cname'];
    $caddress = $_POST['caddress'];
    $ctelephone = $_POST['ctelephone'];
    $cemail = $_POST['cemail'];
    $cwebsite = $_POST['cwebsite'];

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pnum = $_POST['pnum'];
    $tpnum = $_POST['tpnum'];

    $username = $_POST['username'];
    $passwordx = $_POST['passwordx'];
    $password2x = $_POST['password2x'];
    $current_password = $_POST['current_password'];

    // Fetch the current password from the database
    $query = $conn->query("SELECT password FROM organizer WHERE organizer_id='$session_id'");
    $row = $query->fetch();
    $stored_password = $row['password'];

    // Check if current password matches
    if($stored_password == $current_password) {
        // Check if new passwords match
        if($passwordx == $password2x) {
            if(!empty($file_loc) && move_uploaded_file($file_loc, $folder.$final_file)) {
                $conn->query("UPDATE organizer SET fname='$fname', mname='$mname', lname='$lname', username='$username', password='$passwordx', txt_poll_num='$tpnum', email='$email', pnum='$pnum', company_name='$cname', company_address='$caddress', company_logo='$final_file', company_telephone='$ctelephone', company_email='$cemail', company_website='$cwebsite' WHERE organizer_id='$session_id'");
            } else {
                $conn->query("UPDATE organizer SET fname='$fname', mname='$mname', lname='$lname', username='$username', password='$passwordx', txt_poll_num='$tpnum', email='$email', pnum='$pnum', company_name='$cname', company_address='$caddress', company_telephone='$ctelephone', company_email='$cemail', company_website='$cwebsite' WHERE organizer_id='$session_id'");
            }
            echo "<script>window.location = 'dashboard.php'; alert('Organizer $fname $mname $lname updated successfully!');</script>";
        } else {
            echo "<script>alert('New passwords do not match.');</script>";
        }
    } else {
        echo "<script>alert('Incorrect current password.');</script>";
    }
}
?>
  </body>
</html>