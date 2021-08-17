<?php session_start();
   include 'head.html'; 
$con=mysqli_connect("localhost","root","","hospitalmanagement"); 
if(!$con) { die(" Connection Error "); } 

    $query = " select * from appointment ";
    $result = mysqli_query($con,$query);

  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Appointment</title>
</head>

  <div align="center">
    <h4>Search Doctors Fixed Appointment Times  </h4>
<br>
    <label for="searchdoctor">Insert Doctors User ID :</label>
    <br>
    <input type="number" name="searchdoctor" id="searchdoctor">
    <button id="search" onclick="searchdoctor()">search</button> 
    <p id="p2"></p>
<br>

    <script>
        
        function searchdoctor() {
            var searchdoctor = document.getElementById("searchdoctor").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    document.getElementById("p2").innerHTML = xhttp.responseText;
					
                }
            }

            xhttp.open("GET", "appointmentaction2.php?searchdoctor=" + searchdoctor, true);
		
            xhttp.send();
        }

    </script>


<body >
    <h4>All Doctors Fixed Appointment Times List </h4>
        <div class="container">
            <div class="row">
                <div class="col ml-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td> Patient User ID </td>
                                
                                <td> Doctor User ID </td>
                               
                                <td> Start time </td>
                                
                                <td> End time </td>
                                

                               
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $apuserid = $row['puserid'];
                                        $aduserid = $row['duserid'];
                                        $astarttime = $row['starttime'];
                                        $aendtime=$row['endtime'];

                                        
                            ?>
                                    <tr>
                                        <td><?php echo $apuserid ?></td>
                                       
                                        <td><?php echo $aduserid ?></td>
                                        
                                        <td><?php echo $astarttime ?></td>
                                        
                                        <td><?php echo $aendtime ?></td>
                                       

                                    </tr>        
                            <?php 
                                    }
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
          <br>  <br>
<?php

$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'hospitalmanagement' ) or die(mysqli_error($db));
  
$username=$_SESSION['username'];
$query=mysqli_query($db,"SELECT * FROM patient where username='$username'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
$puserid=$row['puserid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment</title>
</head>
<body >
        <div  align="center">
		<h4>Add New Appointment Time </h4>
		
		<br><br>
    <label for="duserid"><b>Add Doctor ID :</b></label>
  <br>  <br>

  <input type="number" name="duserid" id="duserid">
  <br>  <br>
<label for="puserid">Patient User ID :&nbsp;&nbsp;&nbsp;</label>
<br>  <br>
  <input type="text" name="puserid" id="puserid"  placeholder="puserid" value="<?php echo $row['puserid']; ?>" readonly>

    <br>  <br>


  <label for="starttime">Choose Start Time :&nbsp;&nbsp;&nbsp;</label>
  <select name="starttime" id="starttime">

      <option value=""> </option>
      <option value="10 AM">10 AM </option>
      <option value="11 AM">11 AM</option>
      <option value="12 PM">12 PM </option>
      <option value="01 PM">01 PM </option>
      <option value="02 PM">02 PM </option>
      <option value="03 PM">03 PM</option>
      <option value="04 PM">04 PM</option>
      <option value="05 PM">05 PM</option>
      <option value="06 PM">06 PM</option>
      <option value="07 PM">07 PM</option>
      
  </select>
  
    <br>  <br>
        <label for="endtime">Choose End Time :&nbsp;&nbsp;&nbsp;</label>
  <select name="endtime" id="endtime">

      <option value=""> </option>
      
      <option value="11 AM">11 AM</option>
      <option value="12 PM">12 PM </option>
      <option value="01 PM">01 PM </option>
      <option value="02 PM">02 PM </option>
      <option value="03 PM">03 PM</option>
      <option value="04 PM">04 PM</option>
      <option value="05 PM">05 PM</option>
      <option value="06 PM">06 PM</option>
      <option value="07 PM">07 PM</option>
      <option value="08 PM">08 PM</option>
  </select>
  <br>  <br>


	<button id="search" onclick="appointment()" style="height:30px; width:100px">Add</button>

	<p id="p1"></p>
</div>
</body>
<script>
    function appointment() {
      var puserid = document.getElementById("puserid").value;
      var duserid = document.getElementById("duserid").value;
      var starttime = document.getElementById("starttime").value;
      var endtime = document.getElementById("endtime").value;


      if(duserid == "" || starttime == "" || endtime == "" ) {
        document.getElementById("p1").innerHTML = "Fill up the form properly";
        document.getElementById("p1").style.color = "red";
      }

      else {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            document.getElementById("p1").innerHTML = xhttp.responseText;
            document.getElementById("p1").style.color = "green";
          }
        }

        xhttp.open("POST", "appointmentaction.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("puserid="+puserid+"&duserid="+duserid+"&starttime="+starttime+"&endtime="+endtime);
      }
    }
</script>

<br><br>
       <div style="position:fixed;
   right:10px;
   top:40px;" ><a href="index.php"> back to Patient Dashboard</a>
</div>
</html>
