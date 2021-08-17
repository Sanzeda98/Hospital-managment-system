<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Patient Profile Update</title>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  </head>
  <?php
include 'head.html'; 
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'hospitalmanagement' ) or die(mysqli_error($db));
  session_start();
$username=$_SESSION['username'];
$query=mysqli_query($db,"SELECT * FROM patient where username='$username'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
    <div align="center">
  <h2>Patients Profile Update</h2>
  
<div class="profile-input-field">

        
        <form method="post" action="#" >
		<br>
          <div class="form-group">
            <label><b>First Name :</b></label>
            <input type="text" class="form-control" name="FirstName" style="width:20em;" placeholder="FirstName" value="<?php echo $row['FirstName']; ?>">
          </div>
	
		  <div class="form-group">
            <label><b>Last Name :</b></label>
            <input type="text" class="form-control" name="LastName" style="width:20em;" placeholder="LastName" value="<?php echo $row['LastName']; ?>">
          </div>
	
		   <div class="form-group">
            <label><b>Date of Birth :</b></label>
            <input type="date" class="form-control" name="DOB" style="width:20em;" placeholder="DOB" value="<?php echo $row['DOB']; ?>">
          </div>
	
          <div class="form-group">
            <label><b>Email :</b></label>
            <input type="email" class="form-control" name="Email" style="width:20em;" placeholder="Email" required value="<?php echo $row['Email']; ?>">
          </div> 
	
		  <div class="form-group">
            <label><b>Current Password :</b></label>
            <input type="text" class="form-control" name="password" style="width:20em;" placeholder="password" value="<?php echo $row['password']; ?>" readonly >
          </div>
	
		  <div class="form-group">
            <label><b>New Password :</b></label>
            <input type="text" class="form-control" name="password" style="width:20em;" placeholder="password" value="<?php echo $row['password']; ?>">
          </div>
		<br>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:10em;"><br><br>
          </div>
	
		  
		  <div style="position:fixed;
   right:10px;
   top:40px;" ><a href="Homepage.php"> back to Patient Dashboard</a>
</div>
        </form>
      </div>
	   </div>
      </html>
	  
      <?php
	  
      if(isset($_POST['submit'])){
        $FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
        $DOB = $_POST['DOB'];
        $Email = $_POST['Email'];
        $password = $_POST['password'];
		
      $query = "UPDATE patient SET FirstName = '$FirstName',
                      LastName = '$LastName', DOB = '$DOB', Email = '$Email' , password = '$password'
                      WHERE username = '$username'";
					  
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    ?>
                     <script type="text/javascript">
					 
            alert("Update Successfull.");
            window.location = "index.php";
        </script>
        <?php
             }              
?>