<?php //session_start(); 


?>
<!DOCTYPE html>
<html>
<head>
  <title>Request for leave of absence</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css">
  <form name="Request for leave of absence" onsubmit="return validate()" method="POST">
</head>

<?php
include 'head.html';

?>

<body>

  <div align="center">
  <h2>Request for leave of absence</h2>
  <?php


    $Name= "";
    $UserId = "";
    $StartDate = "";
    $EndDate = "";
    $LeaveType = "";
    

    $NameErr= "";
    $UserIdErr= "";
    $StartDateErr = "";
    $EndDateErr = "";
    $LeaveTypeErr= "";
    
   



if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty($_POST['name'])){
     $NameErr = "please fill up this properly"; 
  }
  else{

    $Name = $_POST['name'];

  }
    if(empty($_POST['UserId'])){
     $UserIdErr = "please fill up this properly"; 
   }
   else{

    $UserId = $_POST['UserId'];

   }
  if(empty($_POST['StartDate'])){
    $StartDateErr = "please fill up this properly"; 
  }
  else{

    $StartDate = $_POST['StartDate'];

  }

  if(empty($_POST['EndDate'])){
    $EndDateErr = "please fill up this properly"; 
  }
  else{

    $EndDate = $_POST['EndDate'];

  }

    $LeaveType = $_POST['LeaveType'];


}

?>




<form name="Request for leave of absence" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> "onsubmit="return validate()"  method="POST">
  <label for = "name"> Enter your Name </label>
<input type="text" name="name" id="name">
<p style='color:red'> <?php echo $NameErr; ?> </p>

<br>

<label for = "UserId">Enter your User ID </label>
<input type="text" name="UserId" id="UserId">
<p style='color:red'> <?php echo $UserIdErr; ?> </p>
<br>

<label for = "StartDate"> Enter StartDate </label>
<input type="date" name="StartDate" id="StartDate">
<p style='color:red'> <?php echo $StartDateErr; ?> </p>
<br>

<label for = "EndDate"> Enter EndDate </label>
<input type="date" name="EndDate" id="EndDate">
<p style='color:red'> <?php echo $EndDateErr; ?> </p>
<br>

 <label for="LeaveType">Select Leave Type:</label>
  <select name="LeaveType" id="LeaveType">

      <option value=""> </option>
      <option value="Casual leave">Casual leave </option>
      <option value="Sick leave">Sick leave</option>
      <option value="Annual leave">Annual leave</option>
  </select>


<br>
<br>
<input type="submit" value="Submit"id="submitForm">
</form>
<br>
  <!--<p id="errorMsg"></p>-->

  <script>
      function validate() {
        var isValid = false;

        var username = document.forms["Request for leave of absence"]["name"].value;
        var password = document.forms["Request for leave of absence"]["UserId"].value;
        var password = document.forms["Request for leave of absence"]["StartDate"].value;
         var password = document.forms["Request for leave of absence"]["EndDate"].value;
          var password = document.forms["Request for leave of absence"]["LeaveType"].value;


        if( name == "" || UserId == ""  || StartDate == "" || EndDate == "" || LeaveType == "" ) {
          document.getElementById("errorMsg").innerHTML = "<b>Please fill up the form properly.</b>";
          document.getElementById("errorMsg").style.color = "red";
        }
        else {
          isValid = true;
        }

        return isValid;
      }
    </script>


<br>

<?php




  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hospitalmanagement";

  $con = mysqli_connect($hostname, $username, $password, $dbname);
  if($con->connect_errno){
    echo "Database Connection Failed!...";
    echo "<br>";
    echo $conn1->connect_error;
  }

  else {
    echo "Database Connection Successful!";

  

    $sql = "INSERT INTO nurselv ( Name, UserId, StartDate , EndDate ,LeaveType) VALUES ('$Name', '$UserId', '$StartDate', '$EndDate', '$LeaveType')";
    if($con->query($sql)) {
      echo "Data Insert Successful!";
    }
    else {
      echo "Failed to Insert Data.";
      echo "<br>";
      echo $con->error;
    }
  }
  
  ?>
</body>
<a href="/D/Nurse/index.php"> Click here to go to the Dashboard.</a>

</html>