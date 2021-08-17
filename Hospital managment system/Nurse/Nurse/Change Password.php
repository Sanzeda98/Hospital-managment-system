<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Nurse Change Password</title>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css">
 
  </head>
  <?php
include 'head.html'; 
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'hospitalmanagement' ) or die(mysqli_error($db));
  session_start();
$username=$_SESSION['username'];
$query=mysqli_query($db,"SELECT * FROM nurse where username='$username'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
  <div align="center">
  <h1>Nurse Change Password</h1>
  
<div class="profile-input-field">
<br>
      
        <form method="post" action="#" >
    <br>
         
      <div class="form-group">
            <label><b>Current Password :</b></label>
            <input type="text" class="form-control" name="password" style="width:20em;" placeholder="password" value="<?php echo $row['password']; ?>" readonly >
          </div>
      <br><br>
      <div class="form-group">
            <label><b>New Password :</b></label>
            <input type="text" class="form-control" name="password" style="width:20em;" placeholder="password" value="<?php echo $row['password']; ?>">
          </div>
      <br><br>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:10em;"><br><br>
          </div>
      <br><br>
      
      <a href="index.php"> Click here to go  go to the Dashboard.</a>
        </form>
      </div>
      </html>
    
      <?php
    
      if(isset($_POST['submit'])){
        $password = $_POST['password'];
    
      $query = "UPDATE nurse SET  password = '$password' WHERE username = '$username'";


            
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    ?>
                     <script type="text/javascript">
           
            alert("Update Successfull.");
            window.location = "index.php";
        </script>
        <?php
             }              
?>