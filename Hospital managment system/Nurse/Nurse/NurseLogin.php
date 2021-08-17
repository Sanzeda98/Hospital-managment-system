<?php

    //include('control/logincheck.php');

?>
<?php
   include 'head.html';
		$UserName = "";
		$Password = "";
		$UserNameErr = "";
		$PasswordErr = "";
	if( $_SERVER["REQUEST_METHOD"] == "POST"){



		if(empty($_POST['username'])){
		$UserNameErr = "please fill up this properly";

	}
	else{

		$UserName = $_POST['username'];


	}
		if(empty($_POST['password'])){
		$PasswordErr = "please fill up this properly";

	}
	else{

		$Password = $_POST['password'];


	}

}
?>


<!DOCTYPE html>
<html>
<head>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css">


</head>
<body>
<div align="center">
<title>Nurse Login </title>

<form name="nurselogin" action="logincheck.php" onsubmit="return validate()" method="POST">
  <table>


    <tr>

      <td><h2>Nurse Login</h2></td>
    </tr>
    <tr>
      <td>Username:</td>
      <td><input name="username" type="text" class="Input" >
     <p> <?php echo $UserNameErr; ?> </p>
      </td>
<br>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input name="password" type="password" class="Input" >
     <p> <?php echo $PasswordErr; ?> </p>
      </td>
<br>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>




  </table>
</form>
<br>
	<p id="errorMsg"></p>

	<script>
			function validate() {
				var isValid = false;

				var username = document.forms["nurselogin"]["username"].value;
				var password = document.forms["nurselogin"]["password"].value;


				if( username == "" || password == "" ) {
					document.getElementById("errorMsg").innerHTML = "<b>Please fill up the form properly.</b>";
					document.getElementById("errorMsg").style.color = "red";
				}
				else {
					isValid = true;
				}

				return isValid;
			}
		</script>


</body>
<br><br>
<a href="/Hospital_Management_System-main/Homepage.html"> Click here to go to the Homepage.</a>
</html>
