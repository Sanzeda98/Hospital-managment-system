<?php
	$puserid= "";
	$duserid= "";
	$review= "";
	

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty($_POST['puserid'])){
		 echo  "please fill up properly"; 
		 echo "<br>";
	}
	else{

		$puserid = $_POST['puserid'];

	}
	
	if(empty($_POST['duserid'])){
		 echo  "please fill up properly"; 
		 echo "<br>";
	}
	else{

		$duserid = $_POST['duserid'];

	}
	
	if(empty($_POST['review'])){
		 echo  "please fill up properly"; 
		 echo "<br>";
	}
	else{

		$review = $_POST['review'];

	}
}
if($_SERVER["REQUEST_METHOD"] == "POST") {

			if(empty($_POST['puserid']) ||empty($_POST['duserid']) || empty($_POST['review']) ) {
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

		$sql = "INSERT INTO review ( puserid,duserid, review) VALUES ('$puserid','$duserid','$review')";
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
