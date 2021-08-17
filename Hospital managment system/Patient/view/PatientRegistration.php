<?php 
      include '../controller/JSpatientAction.php';
  ?>    


<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Registration </title>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
</head>

<?php
include 'head.html';

?>

<body>

<h2 align="center">New Patient Registration</h2>
<div class="col ml-5">

<form name="AddPatient" action="controller/JSpatientAction.php" onsubmit="return validate()" method="POST">
<label for = "fname"> First name :&nbsp;&nbsp;&nbsp;</label>

<input type="text" name="fname" id="fname">
<br>

<br>

<label for = "lname"> Last name :&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="lname" id="lname">
<br>
<br>

<label for = "dob"> Date of birth :&nbsp;&nbsp;&nbsp;</label>
<input type="date" name="dob" id="dob">
<br>
<br>

<label for = "gender"> Gender :&nbsp;&nbsp;&nbsp;</label>
<input type="radio" name="gender" id="male" value="male">
<label for = "male"> Male </label>
<input type="radio" name="gender" id="female" value="female">
<label for = "female"> Female </label>
<br>
<br>

<label for = "email"> Email :&nbsp;&nbsp;&nbsp;</label>
<input type="email" name="email" id="email">
<br>
<br>

<label for = "username">User Name :&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="username" id="username">
<br>
<br>

<label for = "password"> Password :&nbsp;&nbsp;&nbsp;</label>
<input type="password" name="password" id="password">
<br>
<br>

  <label for="Blood">Blood group :&nbsp;&nbsp;&nbsp;</label>
  <select name="Blood" id="Blood">
      <option value=""></option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
  </select>


<br><br>

  <label for="Problem">Problem :&nbsp;&nbsp;&nbsp;</label>
  <select name="Problem" id="Problem" onchange="myfun(this.value)">

      <option value=""></option>
      <option value="Mental-Health">Mental Health</option>
      <option value="Eye">Eye</option>
      <option value="Tooth">Tooth</option>
      <option value="Heart">Heart</option>
      <option value="Kidney">Kidney  </option>
      <option value="Skin">Skin </option>
      <option value="Brain">Brain </option>
  </select>
  
  
  
<br><br>

  
      <label for="Disease">Disease :&nbsp;&nbsp;&nbsp;</label>
  <select name="Disease" id="Disease">
<option value=""></option>
      <option value="Corona">Corona</option>
         <option value="Diabetes">Diabetes</option>
            <option value="Cancer">Cancer</option>
               <option value="Flu">Flu</option>
                  <option value="Thalassemia">Thalassemia</option>
                     <option value="Anemia">Anemia</option>
                          <option value="HIV">HIV</option>
      
      
  </select>

<br>
<br>
<input type="submit" value="Submit" style="height:30px; width:150px">

<br>
<br>

<p>Already have an account? <a href="Patientlogin.php">Login here</a>.</p>
</form>



<br>
	<p id="errorMsg"></p>

	<script>
			function validate() {
				var isValid = false;
				var fname = document.forms["AddPatient"]["fname"].value;
				var lname = document.forms["AddPatient"]["lname"].value;
				var dob = document.forms["AddPatient"]["dob"].value;
				var gender = document.forms["AddPatient"]["gender"].value;
				var email = document.forms["AddPatient"]["email"].value;
				var username = document.forms["AddPatient"]["username"].value;
				var password = document.forms["AddPatient"]["password"].value;
				var Blood = document.forms["AddPatient"]["Blood"].value;
				var Problem = document.forms["AddPatient"]["Problem"].value;
				var Disease = document.forms["AddPatient"]["Disease"].value;
				


				if(fname == "" || lname == "" || dob == "" || gender == "" || email == "" || username == "" || password == "" || Blood == "" || Problem == "" || Disease == "") {
					document.getElementById("errorMsg").innerHTML = "<b>Please fill up the form properly.</b>";
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
   top:40px;" ><a href="Homepage.php"> back to Homepage</a>
</div>

<script type="text/javascript">


function myfun(data)
{

var req = new XMLHttpRequest();
req.open("GET","http://localhost/D/Patient/response.php?datavalue="+data,true);
req.send();

req.onreadystatechange=function()
{
	if (req.readyState==4 && req.status==200)
	{
		document.getElementById("Disease").innerHTML = req.responseText;
	}
};

}

</script>

</body>


</html>