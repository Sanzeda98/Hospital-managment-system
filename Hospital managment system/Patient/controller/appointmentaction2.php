<?php 

if($_SERVER["REQUEST_METHOD"] == "GET") {

	$searchdoctor = $_GET['searchdoctor'];
	$sql = "SELECT duserid, puserid, starttime, endtime FROM appointment WHERE duserid = " . $searchdoctor;

	$conn = new mysqli("localhost", "root", "", "hospitalmanagement");

	if($conn -> connect_error) 
	{
		echo "Failed to connect database!";
	}
	
	else 
	{
		$result = $conn -> query($sql);

		if ($result = $conn -> query($sql)) 
		{
			
      
	    while($row = $result -> fetch_assoc()) 
		{
			
        echo "<b>Doctor User ID :</b>&nbsp;". "    ". $row["duserid"] ."<br>". "<b>Patient User ID :</b>&nbsp;". "    ". $row["puserid"] . "<br>" ."<b>Start Time :</b>&nbsp;". "    ". $row["starttime"] . "<br>" ."<b>End Time :</b>&nbsp;". "    ". $row["endtime"]."<br>"."<br>";
      
		}

	} 
		else 
		{
			echo "<br>" . "Not a valid user ID!";
		}
	}
		
	$conn -> close();
}

?>