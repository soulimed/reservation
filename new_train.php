<?php
session_start();
include 'conn.php';

if(isset($_POST['submit'])){
$id = $_POST['id'];
$trainNo = $_POST['trainNo'];
$trainName = $_POST['trainName'];
$fromstation = $_POST['fromstation'];
$tostation= $_POST['tostation'];
$totaldistance=$_POST['totalDistance'];
$businessSeats=$_POST['businessSeats'];
$economicalSeats=$_POST['economicalSeats'];
$standardSeats=$_POST['StandardSeats'];



$sql = "INSERT INTO `trains` (`TrainNo`, `TrainName`, `FromStation`, `ToStation`, `TotalDistance`, `BusinessSeats`, `EconomicalSeats`, `StandardSeats`, `id`) 
VALUES ('$trainNo', '$trainName', '$fromstation', '$tostation', '$totaldistance', '$businessSeats', '$economicalSeats', '$standardSeats', '$id');";
	if(mysqli_query($con, $sql))
{  
	$message = "You have been successfully registered";
}
else
{  
	$message = "Could not insert record"; 
}


	echo "<script type='text/javascript'>alert('$message');</script>";

}
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">



<style>
* {
  box-sizing: border-box;
}
body{
            background: linear-gradient(#e66465, #9198e5);
        }

input[type=text] , input[type=number] , input[type=time]  ,select, textarea {

  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=file]  ,select, textarea {

  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}



label {
  padding: 20px 20px 20px 0;
  display: inline-block;

}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
.mainheading{
	width: 350px;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.icon {
  width: 0.5em;
  height: 0.5em;
  fill: red;
  vertical-align: top;
}


</style>
</head>
<body>
   
<form action="admin_add_train.php" name="admin_add_train" method="post" style="border:1px solid #ccc " >
        <div class="container">
			<br/>
		<ul>
		<li><h1 class="mainheading mr-0">Add New Train</h1></li>
		<li><i class="bi bi-house-fill"></i></li>
		</ul>
			
			
			
			<hr>

			<div class="row">
				<div class="col-25">
				  <label for="trainid">
				  <b>Train Id </b> 
				  <svg class="icon" focusable="false">
				  <use xlink:href="#required"></use>
				  </svg>
				  </label>
				</div>
				<div class="col-75">
				    <input class="form-control" type="text" id="id" name="id"  autofocus placeholder="-- Train Id Here --"  required>
				</div>
			    </div>
				

				<div class="row">
				<div class="col-25">
				  <label for="trainname">
				  <b>Train Name </b> 
				  <svg class="icon" focusable="false">
				  <use xlink:href="#required"></use>
				  </svg>
				  </label>
				</div>
				<div class="col-75">
				    <input class="form-control" type="text" id="trainname" name="trainname"  autofocus placeholder="-- Train Name Here --"  required>
				</div>
			    </div>
				
				<div class="row">
				<div class="col-25">
				  <label for="trainno"><b>Train No </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				    <input class="form-control" type="text" id="trainno" name="trainno" placeholder="-- Train No Here --" required>
				</div>
			    </div>

			  <div class="row">
				<div class="col-25">
				  <label for="city"><b>From(Source) </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				    <select  class="form-control" id="fromstation" name="fromstation">
					<option disabled selected>-- Select City --</option>
					<?php
						$records = mysqli_query($con, "SELECT StationName From station");  // Use select query here 

						while($data = mysqli_fetch_array($records))
						{
							echo "<option value='". $data['StationName'] ."'>" .$data['StationName'] ."</option>";  // displaying data in option menu
						}	
					?>  
				    </select>
               </div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="City"><b>To(Destination) </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <select  class="form-control" id="tostation" name="tostation">
					<option disabled selected>-- Select City --</option>
					<?php
						$records = mysqli_query($con, "SELECT StationName From station");  // Use select query here 

						while($data = mysqli_fetch_array($records))
						{
							echo "<option value='". $data['StationName'] ."'>" .$data['StationName'] ."</option>";  // displaying data in option menu
						}	
					?>  
				    </select>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="distance"><b>Total Distance </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input class="form-control" type="number" id="totaldistance" name="totaldistance" placeholder="-- Total Distance in km/hr Here --" required>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="number"><b>Business Seats </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input class="form-control" type="number" id="businessseats" name="businessseats"  placeholder="-- Total Business Seats Here --" required>
				</div>
			  </div>

			  <div class="row">
				<div class="col-25">
				  <label for="number"><b>Economical Seats </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input class="form-control" type="number" id="economicalseats" name="economicalseats" placeholder="-- Total Economical Seats Here --" required>
				</div>
			  </div>

			  <div class="row">
				<div class="col-25">
				  <label for="number"><b>Standard Seats </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input class="form-control" type="number" id="standardseats" name="standardseats" placeholder="-- Total Standard Seats Here --" required>
				</div>
			  </div>			  
			  
     
			  

			  
			  
				<div class="row">
				  <button style="width: 550px;margin-right: 20px;margin-left: 20;"  class="btn btn-warning " TYPE="Reset" value="Reset" id="reset">background</button>
				  <button   style="width: 550px;" TYPE="Submit" value="Submit" name="submit" id="submit"  onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}" class="btn btn-success ">  Add Train</button>
							
				</div>	
		</div>	
    </form>
    </body>
</html>
