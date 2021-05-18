<?php
session_start();
include 'conn.php';
if (isset($_POST['email'])&& isset($_POST['password'])){
   $Username=$_POST['email'];
$Password=$_POST['password'];
$sql = "SELECT * FROM user_login WHERE Username = '$Username' AND Password = '$Password';";
$sql_result = mysqli_query ($con, $sql) or die ('request "Could not execute SQL query" '.$sql);
$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['Username'];
			$message='User logged in successfully';
			  $_SESSION["Username"] = $user["Username"];
              echo $user["Username"];
			header("location:index.php");
		}
		else{
			$message = 'Wrong email or password.';
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
    <title>Document</title>
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
        <div id="first">
            <div class="myform form ">
                 <div class="logo mb-3">
                     <div class="col-md-12 text-center">
                        <h1>Login</h1>
                     </div>
                </div>
               <form action="login.php" method="post">
                       <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                       </div>
                       <div class="form-group">
                          <label for="exampleInputEmail1">Password</label>
                          <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                       </div>
                       <div class="form-group">
                          <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                       </div>
                       <div class="col-md-12 text-center ">
                          <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                       </div>
                       <div class="col-md-12 ">
                         
            
                       </div>
                       <div class="form-group">
                          <p class="text-center">Don't have account? <a href="registration.php" id="signup">Sign up here</a></p>
                       </div>
                    </form>
            </div>
        </div>
          <div id="second">
              <div class="myform form ">
                    <div class="logo mb-3">
                       <div class="col-md-12 text-center">
                       </div>
                    </div>     
                    </div>
</body>
</html>