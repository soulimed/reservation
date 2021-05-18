<?php
session_start();
include 'conn.php';

if(isset($_POST['submit'])){
$trainId = $_POST['trainId'];
$trainname = $_POST['trainname'];
$fromstation = $_POST['fromstation'];
$tostation= $_POST['tostation'];
$businessclassfare=$_POST['businessclassfare'];
$economicalclassfare=$_POST['economicalclassfare'];
$standardclassfare=$_POST['standardclassfare'];
$arrivaltime=$_POST['arrivaltime'];
$departuretime=$_POST['departuretime'];
$totaldistance=$_POST['totaldistance'];

$sql = "INSERT INTO `add_route` (`id`, `TrainName`, `FromStation`, `ToStation`, `BusinessClassFare`, `EconomicalClassFare`, `StandardClassFare`, `ArrivalTime`, `DepartureTime`, `TotalDistance`) 
VALUES ('$trainId', '$trainname', '$fromstation', '$tostation', '$businessclassfare', '$economicalclassfare', '$standardclassfare', '$arrivaltime', '$departuretime', '$totaldistance');";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>add new rouad</title>
    <style>
        body{
            background: linear-gradient(#e66465, #9198e5);
        }
* {
  box-sizing: border-box;
}


input[type=text] , input[type=number], input[type=time] ,select, textarea {

  width: 100%;
  padding: 12px 20px;
  margin: 8px ;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
label {
  margin: 8px 0px 8px 33px;
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
<form action="new_rouad.php" name="new_rouad.php" method="post" style="border:1px solid #ccc ">
        <div class="container">
			<br/>
			<h1 class="mainheading">Add New Route</h1>
			<hr>


            <div class="row">
				<div class="col-25">
				  <label for="text"><b>Train Id</b>  
				</div>
				<div class="col-75">
				  <input  type="text" class="form-control" id="trainId" name="trainId" placeholder="Train Id"/>
					
				</div>
			  </div>


			  <div class="row">
				<div class="col-25">
				  <label for="text"><b>Select Train</b>  <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <select   class="form-control" id="trainname" name="trainname" autofocus>
					<option disabled selected>-- Select Train --</option>
					<?php
						$records = mysqli_query($con, "SELECT TrainName From trains");  

						while($data = mysqli_fetch_array($records))
						{
							echo "<option value='". $data['TrainName'] ."'>" .$data['TrainName'] ."</option>"; 
                        } 
					?>  
				    </select>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="city"><b>From(Source) </b>  <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				    <select  class="form-control" id="fromstation" name="fromstation">
					<option disabled selected>-- Select City --</option>
					<?php
						$records = mysqli_query($con, "SELECT StationName From station");  
						while($data = mysqli_fetch_array($records))
						{
							echo "<option value='". $data['StationName'] ."'>" .$data['StationName'] ."</option>";  
						}	
					?>  
				    </select>
					</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="City"><b>To(Destination) </b>  <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <select  class="form-control" id="tostation" name="tostation">
					<option disabled selected>-- Select City --</option>
					<?php
						$records = mysqli_query($con, "SELECT StationName From station");  


						while($data = mysqli_fetch_array($records))
						{
							echo "<option value='". $data['StationName'] ."'>" .$data['StationName'] ."</option>"; 
						}	
					?>  
				    </select>
					</div>
			  </div>
			  
			  
			  <div class="row">
				<div class="col-25">
				  <label for="number"><b>Business Class Fare </b>  <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-25">
				  <input  class="form-control" type="number" id="businessclassfare" name="businessclassfare" placeholder="-- Fare in Ruppee --">
				</div>
			  </div>

			  <div class="row">
				<div class="col-25">
				  <label for="number"><b>Economical Class Fare </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input  class="form-control" type="number" id="economicalclassfare" name="economicalclassfare" placeholder="-- Fare in Ruppee --">
				</div>
			  </div>		

			  <div class="row">
				<div class="col-25">
				  <label for="number"><b>Standard Class Fare </b>  <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input   class="form-control" type="number" id="standardclassfare" name="standardclassfare" placeholder="-- Fare in Ruppee --">
				</div>
			  </div>

               <div class="row">
				<div class="col-25">
				  <label for="text"><b>Arrival Time </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input  class="form-control" type="time" id="arrivaltime" name="arrivaltime"  required>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="City"><b>Departure Time </b> <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input  class="form-control" type="time" id="departuretime" name="departuretime"  required>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-25">
				  <label for="text"><b>Distance </b>  <svg class="icon" focusable="false"><use xlink:href="#required"></use></svg></label>
				</div>
				<div class="col-75">
				  <input  class="form-control" type="number" id="totaldistance" name="totaldistance" placeholder="-- Distance in km/hr --" required>
				</div>
			  </div>
			  
				<div class="row">
				  <button  style="width: 550px;margin-right: 20px;margin-left: 20;" class="btn btn-warning" TYPE="Reset" value="Reset" id="reset">Reset</button>
				  <button    style="width: 550px;" type="submit" value="Submit" name="submit" id="submit"  onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}" class="btn btn-success ">  Add Route</button>
					
				</div>		
		</div>	
		
    </form>

 </body>
</html>
<?php
if(isset($_SESSION['error']))
{
session_destroy();
}
?>