<?php include 'head.html'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Doctors list</title>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
  <div align="center">
	<h2>Search Doctors </h2>
<br>
	<label for="searchdoctor">Insert Doctors User ID :</label>
	<br>
	<input type="number" name="searchdoctor" id="searchdoctor">
	<button id="search" onclick="searchdoctor()">search</button> 
	<p id="p1"></p>
<br>

	<h2>All available Doctors list: </h2>
	<br>
 </div>
<?php 

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if(empty($searchdoctor)) {

		$sql = "SELECT duserid, FirstName, LastName, Gender, Email, username, Speciality FROM doctor";

	$conn = new mysqli("localhost", "root", "", "hospitalmanagement");

	if($conn -> connect_error) {
		echo "Failed to connect database!";
	}
	else {

		$result = $conn -> query($sql);

		if($result -> num_rows > 0) {

			echo "<ol>";

			while($row = $result -> fetch_assoc()) {

				echo "<li>";
				echo "<b>Doctor User ID :</b>&nbsp;". "    ". $row["duserid"] ."<br>". "<b>Doctor User name :</b>&nbsp;". "    ". $row["username"] . "<br>" ."<b>First name :</b>&nbsp;". "    ". $row["FirstName"] . "<br>" ."<b>Last name :</b>&nbsp;". "    ". $row["LastName"] .  "<br>" ."<b>Gender :</b>&nbsp;". "    ". $row["Gender"] . "<br>" ."<b>Email :</b>&nbsp;". "    ". $row["Email"] .  "<br>" ."<b>Speciality :</b>&nbsp;". "    ". $row["Speciality"] ."<br>"."<br>";
				echo "</li>";
			}

			echo "</ol>";
		} 
		else {
			echo "Not a valid user ID!";
		}
	}

	$conn -> close();
	}
	
}

?>

	<script>
		
		function searchdoctor() {
			var searchdoctor = document.getElementById("searchdoctor").value;

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
					document.getElementById("p1").innerHTML = xhttp.responseText;
				}
			}

			xhttp.open("GET", "doctorviewlistaction.php?searchdoctor=" + searchdoctor, true);
			xhttp.send();
		}

	</script>

</body>
<br><br>
 <div style="position:fixed;
   right:10px;
   top:40px;" ><a href="index.php"> back to Patient Dashboard</a>
</div>
</html>