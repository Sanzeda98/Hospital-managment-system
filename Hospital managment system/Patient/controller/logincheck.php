<?php
   include 'head.html'; 
		$UserName = "";
		$Password = "";
		$UserNameErr = "";
		$PasswordErr = "";
	if( $_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	
		if(empty($_POST['username'])){
		echo "please fill up username properly"; 
		echo "<br>";
				 
	}
	else{

		$UserName = $_POST['username'];
		

	}
		if(empty($_POST['password'])){
		echo "please fill up password properly"; 
			echo "<br>";	 
	}
	else{

		$Password = $_POST['password'];
		

	}

	if(!empty($_POST['remember']))
	{
		$cookie_name = "username";
		$cookie_value = "username";
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	}


}
	session_start();

	include('../model/db.php');
 
	$error="";
	$msg ="";

	if (isset($_POST['Submit'])) {
		$username=$_POST['username'];
		$password=$_POST['password'];

		$connection = new db();
		$conobj=$connection->OpenCon();
		$userQuery=$connection->CheckUser($conobj,"patient",$username);

		if($userQuery->num_rows > 0){
			while($row = mysqli_fetch_assoc($userQuery)){
				
				$pass_w = $row["password"];

				if ($pass_w == $password){
						
					$_SESSION['username']=$username;
						header("location:index.php");

				}

				else{ echo "*Password is incorrect!";}
			}
		}

		else {echo "*Username or Password is invalid";}

		$connection->CloseCon($conob);
}
	}
?>
