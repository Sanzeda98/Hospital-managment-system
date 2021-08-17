<?php 
   include 'head.html'; 
$con=mysqli_connect("localhost","root","","hospitalmanagement"); 
if(!$con) { die(" Connection Error "); } 

    $query = " select * from doctor ";
    $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Schedule</title>
</head>
<body >

        <div class="container">
            <div class="row">
                <div class="col ml-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td> Doctor User ID </td>
                                
                                <td> First Name </td>
                               
                                <td> Last Name </td>

                                <td> Gender  </td>
                                
                                <td> Email </td>
                                
                                <td> Speciality  </td>
								
								 <td> Start Time  </td>
								 
								  <td> End Time  </td>
                               
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $duserid = $row['duserid'];
                                        $FirstName = $row['FirstName'];
                                        $LastName = $row['LastName'];

                                        $Gender=$row['Gender'];
                                        $Email = $row['Email'];
                                    
                                        $Speciality = $row['Speciality'];
                                            $starttime = $row['starttime'];
											    $endtime = $row['endtime'];
                                        
                            ?>
                                    <tr>
                                        <td><?php echo $duserid ?></td>
                                       
                                        <td><?php echo $FirstName ?></td>
                                        
                                        <td><?php echo $LastName ?></td>
                                        
                                    
                                        <td><?php echo $Gender ?></td>
                                       
                                        <td><?php echo $Email ?></td>
                                       
                                        <td><?php echo $Speciality ?></td>
										
										<td><?php echo $starttime ?></td>
										
										<td><?php echo $endtime ?></td>
                                       

                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
       
</div>
</body>

<br><br>
        <div style="position:fixed;
   right:10px;
   top:40px;" ><a href="index.php"> back to Patient Dashboard</a>
</div>

</html>
