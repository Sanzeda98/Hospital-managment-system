<?php
	$puserid= "";
	$duserid= "";
	$starttime= "";
	$endtime= "";
	
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty($_POST['puserid'])){
		 echo  "please fill puserid properly"; 
		 echo "<br>";
	}
	else{

		$puserid = $_POST['puserid'];

	}
	
	if(empty($_POST['duserid'])){
		 echo  "please fill duserid properly"; 
		 echo "<br>";
	}
	else{

		$duserid = $_POST['duserid'];

	}
	
	if(empty($_POST['starttime'])){
		 echo  "please fill start ttime properly"; 
		 echo "<br>";
	}
	else{

		$starttime = $_POST['starttime'];

	}
		if(empty($_POST['endtime'])){
		 echo  "please fill end time properly"; 
		 echo "<br>";
	}
	else{

		$endtime = $_POST['endtime'];

	}
}
if($_SERVER["REQUEST_METHOD"] == "POST") {

	if(empty($_POST['puserid'])  ||empty($_POST['duserid'])  || empty($_POST['starttime']) || empty($_POST['endtime']) ) {
				echo "Invalid Data Insertion ";
			}
				else{
					
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
		echo "<br>";

		$sql = "INSERT INTO appointment (puserid, duserid, starttime, endtime) VALUES ('$puserid','$duserid','$starttime','$endtime')";
		
		if($con->query($sql)) {
		echo " Data Inserted Successfully .";
		echo "<br>";
		  ?>
            <script type="text/javascript">	 
            alert("Thank you for your Review.");
            window.location = "index.php";
        </script>
        <?php
		         
		}
		else {
			
			echo "Failed to Insert Data.";
			echo "<br>";
			echo $con->error;
		}
	}
}}
?>