<!DOCTYPE html>
<html lang="en">

    <?php 
    include('header.php');
    // Include your database connection
    include('dbcon.php'); // Make sure this file contains the $conn variable and the connection logic.
    ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <body>
    
    <div class="container">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Event Organizer Registration Form</h3>
          </div>
          <div class="panel-body">
            <form method="POST">
              <table align="center">
                <tr><td colspan="5"><strong>Basic Information</strong><hr /></td></tr>
                <tr>
                  <td>
                    Firstname:
                    <input type="text" name="fname" class="form-control" placeholder="Firstname" aria-describedby="basic-addon1" required autofocus>
                  </td>
                  <td>&nbsp;</td>
                  <td>
                    Middlename:
                    <input type="text" name="mname" class="form-control" placeholder="Middlename" aria-describedby="basic-addon1" required>
                  </td>
                  <td>&nbsp;</td>
                  <td>
                    Lastname:
                    <input type="text" name="lname" class="form-control" placeholder="Lastname" aria-describedby="basic-addon1" required>
                  </td>
                </tr>
                
                <!-- <tr><td colspan="5">&nbsp;</td></tr>
                <tr><td colspan="5"><strong>Notification Information</strong><hr /></td></tr>
                <tr>
                  <td>
                    Email:
                    <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" required>
                  </td>
                </tr> -->
                
                <tr><td colspan="5">&nbsp;</td></tr>
                <tr><td colspan="5"><strong>Account Security</strong><hr /></td></tr>
                <tr>
                  <td>
                    Username:
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required>
                  </td>
                  <td>&nbsp;</td>
                  <td>
                    Password:
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" required>
                  </td>
                  <td>&nbsp;</td>
                  <td>
                    Re-type Password:
                    <input id="confirm_password" type="password" name="password2" class="form-control" placeholder="Re-type Password" aria-describedby="basic-addon1" required>
                  </td>
                </tr>
                
                <tr>
                  <td colspan="4">&nbsp;</td>
                  <td><span id='message'></span></td>
                </tr>
              </table>
              <br />
              <div class="btn-group pull-right">
              <button name="register" type="submit" class="btn btn-primary">Register</button>
                <a href="index.php" type="button" class="btn btn-default">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3"></div>
    </div>
          
    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <font size="2" class="pull-left"><strong>Event Judging System &middot; 2023 &COPY;</strong></font>
      </div>
    </footer>      

    <!-- Scripts -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="javascript/jquery1102.min.js"></script>
    
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
if (isset($_POST['register'])) {
   $fname = $_POST['fname']; 
   $mname = $_POST['mname'];  
   $lname = $_POST['lname'];  
   $username = $_POST['username'];  
   $password = $_POST['password'];  
   $password2 = $_POST['password2'];  
  
   if ($password == $password2) {
     try {
       $stmt = $conn->prepare("INSERT INTO organizer (fname, mname, lname, username, password, access, status) VALUES (:fname, :mname, :lname, :username, :password, 'Organizer', 'offline')");
       $stmt->bindParam(':fname', $fname);
       $stmt->bindParam(':mname', $mname);
       $stmt->bindParam(':lname', $lname);
       $stmt->bindParam(':username', $username);
       $stmt->bindParam(':password', $password);
       
       if ($stmt->execute()) {
         echo "<script>
           Swal.fire({
             title: 'Success!',
             text: 'Organizer $fname $mname $lname registered successfully!',
             icon: 'success',
             confirmButtonText: 'OK'
           }).then((result) => {
             if (result.isConfirmed) {
               window.location = 'index.php';
             }
           });
         </script>";
       } else {
         echo "<script>
           Swal.fire({
             title: 'Error!',
             text: 'There was an error registering the organizer. Please try again.',
             icon: 'error',
             confirmButtonText: 'OK'
           });
         </script>";
       }
     } catch(PDOException $e) {
       echo "<script>
         Swal.fire({
           title: 'Error!',
           text: 'Database error: " . $e->getMessage() . "',
           icon: 'error',
           confirmButtonText: 'OK'
         });
       </script>";
     }
   } else {
     echo "<script>
       Swal.fire({
         title: 'Error!',
         text: 'Organizer $fname $mname $lname registration cannot be done. Password and Re-typed password did not match.',
         icon: 'error',
         confirmButtonText: 'OK'
       });
     </script>";
   }
}
?>
</body>
</html>