<!DOCTYPE html>
<html lang="en">

<?php 
include('../admin/header.php');
include('../admin/session.php');
?>

<body style="background:url(../img/Community-College-Madridejos.jpeg)">

<div class="container">
   <div class="col-lg-3">  </div>
   <div class="col-lg-6">
      <br><br>
      <div class="panel panel-danger">
         <div class="panel-heading">
            <h3 class="panel-title"><strong>STUDENT REGISTRATION FORM</strong></h3>
         </div>
         <div class="panel-body">
            <form method="POST">
               <table align="center">
                  <tr><td colspan="5"><strong>Basic Information</strong><hr /></td></tr>
                  <tr>
                     <td>
                        <strong>Firstname:</strong>
                        <input type="text" name="fname" class="form-control" placeholder="Firstname" aria-describedby="basic-addon1" required autofocus>
                     </td>
                     <td>&nbsp;</td>
                     <td>
                        <strong>Middlename:</strong>
                        <input type="text" name="mname" class="form-control" placeholder="Middlename" aria-describedby="basic-addon1" required>
                     </td>
                     <td>&nbsp;</td>
                     <td>
                        <strong>Lastname:</strong>
                        <input type="text" name="lname" class="form-control" placeholder="Lastname" aria-describedby="basic-addon1" required>
                     </td>
                  </tr>
                  <tr><td colspan="5">&nbsp;</td></tr>
                  <tr>
                     <td>
                        <strong>Course:</strong>
                        <input type="text" name="course" class="form-control" placeholder="Course" aria-describedby="basic-addon1" required>
                     </td>
                     <td>&nbsp;</td>
                     <td colspan="3">
                        <strong>Student ID #:</strong>
                        <input type="text" name="student_id" class="form-control" placeholder="ID #" aria-describedby="basic-addon1" required>
                     </td>
                  </tr>
               </table>
               <br />
               <div class="btn-group pull-right">
                  <button name="register" type="submit" class="btn btn-primary">Register</button>
                  <a href="index.php" type="button" class="btn btn-default">Cancel</a>
               </div>
            </form>
         </div><!-- end panel body -->
      </div> <!-- end panel -->
   </div><!-- end col-6 -->
   <div class="col-lg-3">  </div>
</div> <!-- end container -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="javascript/jquery1102.min.js"></script>
<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

<?php 
if(isset($_POST['register'])) {
   $fname = $_POST['fname'];
   $mname = $_POST['mname'];
   $lname = $_POST['lname'];
   $course = $_POST['course'];
   $student_id = $_POST['student_id'];

   // Database connection
   include('../admin/dbcon.php');

   $stmt = $conn->prepare("INSERT INTO student (student_id, fname, mname, lname, course) VALUES (:student_id, :fname, :mname, :lname, :course)");
   
   $stmt->bindParam(':student_id', $student_id);
   $stmt->bindParam(':fname', $fname);
   $stmt->bindParam(':mname', $mname);
   $stmt->bindParam(':lname', $lname);
   $stmt->bindParam(':course', $course);
   
   if($stmt->execute()) {
       echo "<script>
               alert('Student $fname $lname registered successfully!');
               window.location = 'index.php';
             </script>";
   } else {
       echo "<script>
               alert('Error: Could not register student.');
             </script>";
   }

   $stmt->close();
   $conn->close();
}
?>
</body>
</html>
