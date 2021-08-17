<?php  
include 'head.html'; 
session_start();
 
//if(!isset($_SESSION['username']))
//    header('location:patientlogin.php');
//}
?>

<html>
<head>
 <title>Profile Page</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
<div align="center">
<h2>Patients Dashboard</h2>

<br>

<a href="patientprofile.php">Check Profile</a><br><br>
<a href="updateprofile.php">Update Profile </a><br><br>
<a href="viewlist.php">Check Doctor List </a><br><br>
<a href="checkdoctortime.php">Check Doctor Schedule </a><br><br>
<a href="appointment.php"> View & Add Appointments</a><br><br>
<a href="testresult.php">Patients Test Results</a><br><br>
<a href="payment.php">Bills & Payment</a><br><br>
<a href="review.php">Submit Review</a><br><br>

<br>
</div>

<div style="position:fixed;
   right:20px;
   top:65px;" >
	<a href="/Logout.php" >Logout</a>
</div>
<br>

</body>
</html>
 <?php include 'footer.html'; ?>