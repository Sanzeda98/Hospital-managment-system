<?php 

if($_SERVER["REQUEST_METHOD"] == "GET") {

	$searchdoctor = $_GET['searchdoctor'];
	$sql = "SELECT duserid, FirstName, LastName, Gender, Email, username, Speciality FROM doctor WHERE duserid = " . $searchdoctor;

	
	$conn = new mysqli("localhost", "root", "", "hospitalmanagement");

	if($conn -> connect_error) {
		echo "Failed to connect database!";
	}
	else {

		$result = $conn -> query($sql);

		if ($result = $conn -> query($sql))  {

			while($row = $result -> fetch_assoc()) {

				echo "<br>" ."<b>Doctor User ID :</b>&nbsp;". "    ". $row["duserid"] ."<br>". "<b>Doctor User name :</b>&nbsp;". "    ". $row["username"] . "<br>" ."<b>First name :</b>&nbsp;". "    ". $row["FirstName"] . "<br>" ."<b>Last name :</b>&nbsp;". "    ". $row["LastName"] .  "<br>" ."<b>Gender :</b>&nbsp;". "    ". $row["Gender"] . "<br>" ."<b>Email :</b>&nbsp;". "    ". $row["Email"] .  "<br>" ."<b>Speciality :</b>&nbsp;". "    ". $row["Speciality"] ."<br>";
				
			}

		} 
	
		else {
			echo "<br>" . "Not a valid user ID!";
		}
	}
		
	$conn -> close();
}

?>