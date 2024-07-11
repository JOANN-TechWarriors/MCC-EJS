<?php
		include('dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* student */
			$query = $conn->query("SELECT * FROM organizer WHERE username='$username' AND password='$password'");
			$row = $query->fetch();
			$num_row = $query->rowcount();
		if( $num_row > 0 ) { 
		  
	 if($row['access']=="Organizer")
     {
        $_SESSION['useraccess']="Organizer";
        $_SESSION['id']=$row['organizer_id'];
		$_SESSION['email']=$row['email'];
        
        ?>	<script>window.location = 'home.php';</script><?php
        	
     }
     else
     {
        
        $_SESSION['useraccess']="Tabulator";
        $_SESSION['id']=$row['org_id'];
        $_SESSION['userid']=$row['organizer_id'];
		$_SESSION['email']=$row['email'];
        
        ?>	<script>window.location = 'dashboard.php';</script><?php
        	
     }
	 if($row['access']=="Judge")
     {
        $_SESSION['useraccess']="Judge";
        $_SESSION['id']=$row['judge_id'];
		$_SESSION['email']=$row['email'];
        
        // ?>	<script>window.location = 'judge_panel.php'</script><?php
     }

    }else{ 
        ?>	<script>
          alert('Username and Password did not Match');
          window.location = 'judge_panel.php';
            </script><?php	
    }	
            
    ?>
        	
    <!-- //  } -->
    //  else
	//  if($row['access']=="Student")
    <!-- //  { -->
    //     $_SESSION['useraccess']="Student";
    //     $_SESSION['id']=$row['student_id'];
	// 	// $_SESSION['email']=$row['email'];
        
    //     ?>	<script>window.location = 'home.php';</script><?php
        	
     {
		}else{ 
			?>	<script>
              alert('Username and Password did not Match');
			  window.location = 'judge_panel.php';
			    </script><?php	
		}	
				
		?>
        