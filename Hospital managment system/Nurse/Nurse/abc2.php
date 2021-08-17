<?php

	//sleep(3);

	$name = $_REQUEST['name'];

	$conn = mysqli_connect('localhost', 'root', '', 'hospitalmanagement');
	$sql = "select * from review where `puserid` like '%{$name}%'";
	$result = mysqli_query($conn, $sql);

	$response = "<table border=1>
					<tr>
						<td>ID</td>
						<td>puserid</td>
						<td>review</td>
						
					</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
		$response .= "	<tr>
							 <td>{$row['ID']}</td>
							  <td>{$row['puserid']}</td>
							  <td>{$row['review']}</td>
							   
						</tr>";
	}

	$response .= "</table>";

	echo $response;
?>
