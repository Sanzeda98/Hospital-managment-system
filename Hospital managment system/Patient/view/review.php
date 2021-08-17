-<?php session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Review </title>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

  

<?php
include 'head.html';

?>

  <?php

$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'hospitalmanagement' ) or die(mysqli_error($db));
  
$username=$_SESSION['username'];
$query=mysqli_query($db,"SELECT * FROM patient where username='$username'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
  
  

<body>

	<h2 align="center">Patient Review</h2>
	
<br>

<br>
<div class="col ml-5">

<form name="review" action="JSpatientreview.php" onsubmit="return validate()" method="POST">
	
<label for = "puserid"> <b> Patient User ID </b> :&nbsp;&nbsp;&nbsp;</label>

<br>
<br>
<input type="text" class="form-control" name="puserid" id="puserid" style="width:20em;"  value="<?php echo $row['puserid']; ?>" readonly>
<br>
<br>

<label for = "duserid"> <b> Doctor User ID </b> :&nbsp;&nbsp;&nbsp;</label>

<br>
<br>
<input type="text" class="form-control" name="duserid" id="duserid" style="width:20em;" placeholder="Enter Doctor User ID">
<br>
<br>

<label for = "review"> <b> Review </b> :&nbsp;&nbsp;&nbsp;</label>

<br>
<br>
<textarea id="review" name="review" rows="4" cols="50" placeholder="Enter User Review">
</textarea>

<br>
<br>
<input type="submit" value="Submit" style="height:30px; width:150px">
</form>


<br>
	<p id="errorMsg"></p>

	<script>
			function validate() {
				var isValid = false;
				var puserid = document.forms["review"]["puserid"].value;
				var duserid = document.forms["review"]["duserid"].value;
				var review = document.forms["review"]["review"].value;

				if(review == "" || puserid == "" || duserid == ""  ) {
					document.getElementById("errorMsg").innerHTML = "<b>Please fill up properly.</b>";
					document.getElementById("errorMsg").style.color = "red";
				}
				else {
					isValid = true;
				}

				return isValid;
			}
		</script></div>
        <div style="position:fixed;
   right:10px;
   top:40px;" ><a href="index.php"> back to Patient Dashboard</a>
</div>

</body>


</html>