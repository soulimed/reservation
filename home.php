<?php
session_start();
if (isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost","root","","wagon");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$Username=$_POST['Username'];
$Passwords=$_POST['Passwords'];
$sql = "SELECT * FROM user_login WHERE Username = '$Username' AND Passwords = '$Passwords';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['Username'];
			$message='User logged in successfully';
			  $_SESSION["Username"] = $user["Username"];
              echo $user["Username"];
			header("location:passenger_home.php");
		}
		else{
			$message = 'Wrong email or password.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
		
}
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>Le wagon</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
        <link rel="stylesheet" href="styles.css">
		<SCRIPT src="validationlogin.js"></SCRIPT>
		<SCRIPT src="validationloginadmin.js"></SCRIPT>
		<style>
.wrap{
	background-color:#FFFFFF;
	padding:0 10px;
	border:solid 1px;
	-o-box-shadow: 10px 10px 5px #888;
	-moz-box-shadow: 10px 10px 5px #888;
	-webkit-box-shadow: 10px 10px 5px #888;
	box-shadow: 0px 0px 25px #666;

}

		</style>
    </head>
    <body 
    <?php
        include 'header.php';
        ?>
            <div class="row">
                <div class="  col-lg-6">
					  <br/><h1 class="welcome">Bienvenue a notre page web "le wagon"</h1>
					<div >
							<div  Style="float:right;">
							<hr />
							<marquee behavior="scroll" id="marq"  scrollamount=3 direction="up" height="190px" onmouseover="nestop()" onmouseout="nestrt()">
								<div>
									<p class="lead"><b>Bienvenue aux chemins de fer tunisiens Management System Vous pouvez réserver vos billets à l'avance ici et vous pouvez rechercher n'importe quel train vers n'importe quelle gare à tout moment.</b></p>
									<hr class="my-4">
									<p><b>Profitez de votre voyage avec nous et espérons que vous contribuerez à devenir un meilleur citoyen tunisien
                  </b></p>
								</div>
							</marquee>
							</div>
				    </div>
                              
                </div>
				
                         <div class="col-lg-6">
						 <br/><div class="slider">
							<img src="im2.jpg" width="100%" />
						</div>
                         </div>
		
            </div> 
	
        </div>

<!--

    Modals
-->
<marquee class="marque" bgcolor="#50AAB4 "  scrolldelay="1"><h5>Bienvenue à la réservation des chemins de fer tunisiens Réservation de billets Réservez et profitez du voyage</h5></marquee>


<div id="loginModaladmin" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
            <div class="modal-header" id="clr2">
                <h4 class="modal-title" style="font-family:Didot, serif; font-size: 30px;" > 
                    Login
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;

                </button>
            </div>
            <div class="modal-body" id="clr">
			    	
				<form id="clr1" action=""  method="post" name="login" onsubmit="return validateloginadmin()">
				<div class="mylogin">
				<div  ><label for="Username" class=" col-form-label"><b>Username :</b></label></div>
				<div ><input type="text" id="AdminUsername" size="30" maxlength="30" name="AdminUsername" autofocus placeholder="-- Username Here --" class=" form-control"/></div>
				<div >
					<label for="Password" class="col-form-label"><b>Password : </b></label>
				</div>
				<div >
					<input type="password" id="Password" size="30" maxlength="30" name="Password" placeholder="-- Password Here --" class=" form-control"/>
				</div>
				
				<br/>
				<div class="text-center">
				<button style=" width:40%" type="button" class="btn btn-danger " class="close" data-dismiss="modal"><a> Close </a> </button>
				<INPUT style=" width:40%" class="btn btn-success " TYPE="Submit" value="Login" name="done" id="done" class="button">
				</div>
				</div>
				</form>
					
                
            </div>
        </div>
    </div>
</div>

<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
            <div class="modal-header" id="clr2">
                <h4 class="modal-title" style="font-family:Didot, serif; font-size: 30px;" > 
                    Login
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;

                </button>
            </div>
            <div class="modal-body" id="clr">
			    	
				<form id="clr1" action="Home.php"  method="post" name="login" onsubmit="return validatelogin()">
				<div class="mylogin">
				<div  ><label for="Username" class=" col-form-label"><b>Username :</b></label></div>
				<div ><input type="text" id="Username" size="30" maxlength="30" name="Username" autofocus placeholder="-- Username Here --" class=" form-control"/></div>
				<div >
					<label for="Password" class="col-form-label"><b>Password : </b></label>
				</div>
				<div >
					<input type="password" id="Passwords" size="30" maxlength="30" name="Passwords" placeholder="-- Password Here --" class=" form-control"/>
				</div>
				
				<br/>
				<div class="text-center">
				<button style=" width:40%" type="button" class="btn btn-danger " class="close" data-dismiss="modal"><a> Close </a> </button>
				<INPUT style=" width:40%" class="btn btn-success " TYPE="Submit" value="Login" name="submit" id="submit" class="button">
				</div>
				</div>
				</form>
					
                
            </div>
        </div>
    </div>
</div>
  <!--
      End of Modals
  --><about class="aboutus">
      <h1 class="mainheading">About Us</h1>
	  <hr/>
    
    <p id="p1">La Société nationale des chemins de fer tunisiens (arabe : الشركة الوطنية للسكك الحديدية التونسية) ou SNCFT est une entreprise publique chargée de la gestion, de l'entretien et de l'exploitation du réseau ferroviaire tunisien. Cette entreprise ferroviaire, placée sous tutelle du ministère du Transport, gère un réseau de 23 lignes d'une longueur totale de 2 153 kilomètres et 200 gares et transporte aussi bien des voyageurs (grandes lignes et banlieues) que des marchandises, aux trois-quarts des phosphates..</p>
    
	<hr>
     </about> 

	<div >
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3195.0290960293464!2d10.177828614640374!3d36.793852775757884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd3596c1556a9b%3A0x4e67c707110cff!2sGare%20de%20Barcelone!5e0!3m2!1sfr!2stn!4v1620212981020!5m2!1sfr!2stn" width="100%" height="800" style="border:0;" allowfullscreen="" loading="lazy"></iframe> </iframe>
    </div>
	
    <footer class="mt-5" id="process">
	    <div class="container">
            <div class="row">
                <div class="col-lg-6">
				    <h1><span class="fa fa-question-circle"></span> Complain Section</h1>
                    <form>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Email address</label>
                          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Your Complain</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <button type="button" class="btn btn-danger mt-3">Submit Complain</button>
                        </div>
                        </form>
                </div>
                <div class="col-lg-6 ">
                    <h1><span class="fa fa-user"></span> Contact Info</h1>
                    <p class="mt-5"><span><i class="fa fa-envelope" aria-hidden="true"></i>    Gmail : soulimed1999@gmail.com</span></p>
                    <p class="mt-3"><span ><i class="fa fa-phone" aria-hidden="true"></i>  Phone number : +216 50373955</span></p>
                    <p class="mt-3"><span ><i class="fa fa-fax "></i>                      fax :70366522</span></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
      $('#log_in').click(function(){
                $('#loginModal').modal();

            });
</script>  

<script>
      $('#log_in_admin').click(function(){
                $('#loginModaladmin').modal();

            });
</script>

</body>
</html>

<?php

if(isset($_SESSION['error']))
{
session_destroy();
}

?>