 <!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Patient Profile</title>
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
   <h2>Patients Profile</h2>
<div class="profile-input-field">
        
        <form method="post" action="#" >
		<br>
		
		<div class="form-group">
            <label><b>User Name :</b></label>
            <input type="text" class="form-control" name="username" style="width:20em;" placeholder="username" required value="<?php echo $row['username']; ?>" readonly>
          </div>
		  
		  <div class="form-group">
            <label><b>Password :</b></label>
            <input type="text" class="form-control" name="password" style="width:20em;" placeholder="password" value="<?php echo $row['password']; ?>" readonly>
          </div>
		  
          <div class="form-group">
            <label> <b>First Name :</b></label>
            <input type="text" class="form-control" name="FirstName" style="width:20em;" placeholder="FirstName" value="<?php echo $row['FirstName']; ?>" readonly>
          </div>
		  
		  <div class="form-group">
            <label><b>Last Name :</b></label>
            <input type="text" class="form-control" name="LastName" style="width:20em;" placeholder="LastName" value="<?php echo $row['LastName']; ?>" readonly>
          </div>
		  
		   <div class="form-group">
            <label><b>Date of Birth :</b></label>
            <input type="date" class="form-control" name="DOB" style="width:20em;" placeholder="DOB" value="<?php echo $row['DOB']; ?>" readonly>
          </div>
		  
		  <div class="form-group">
            <label><b>Gender :</b></label>
            <input type="text" class="form-control" name="Gender" style="width:20em;" placeholder="Gender" value="<?php echo $row['Gender']; ?>" readonly>
          </div>
		  
          <div class="form-group">
            <label><b>Email ID :</b></label>
            <input type="email" class="form-control" name="Email" style="width:20em;" placeholder="Email" required value="<?php echo $row['Email']; ?>" readonly>
          </div>
		  
		  <div class="form-group">
            <label><b>Blood Group:</b></label>
            <input type="text" class="form-control" name="Blood" style="width:20em;" placeholder="Blood" value="<?php echo $row['Blood']; ?>" readonly>
          </div>
		  
		   <div class="form-group">
            <label><b>Problem :</b></label>
            <input type="text" class="form-control" name="Problem" style="width:20em;" placeholder="Problem" value="<?php echo $row['Problem']; ?>" readonly>
          </div>
		  
		  <div class="form-group">
            <label><b>Disease :</b></label>
            <input type="text" class="form-control" name="Disease" style="width:20em;" placeholder="Disease" value="<?php echo $row['Disease']; ?>" readonly>
          </div>
		  
		  
		 
		 <br>
		   <div style="position:fixed;
   right:10px;
   top:40px;" ><a href="Homepage.php"> back to Patient Dashboard</a>
</div>
        </form>
      </div>
	    </div>
      </html>