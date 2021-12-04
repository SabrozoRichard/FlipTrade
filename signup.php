<?php 

	include("classes/connect.php");
	include("classes/signup.php");
	$firstname = "";
	$lastname = "";
	$email = "";
	$address = "";
	$gender = "";



	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		# code...
		$signup = new Signup();
		$result = $signup->evaluate($_POST);

		if ($result != "") {
			# code...
			echo "<div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
			echo "the following errors occured: <br><br>";
			echo $result;
			echo "</div>";
		}else{

			header("Location: login.php");
			die;
		}
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$gender = $_POST["gender"];

	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup | Fliptrade</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
	<div class="login-page">
		<div class="login-box">
			<div class="img">
				<img src="img/lg.png" alt="login Image"> <!-- logo image -->
			</div>
			<div class="login-form"> <!-- signup content -->
				<div class="form-heading">
 					<h3>Sign Up</h3>
 				</div>
 				<form method="post" action="signup.php" >
 					<p>Please fill with your details</p> <!-- sign up text box -->
 					<div style="display: flex;">
 						<input value="<?php echo $firstname ?>" name="firstname" type="text" class="form-control register" placeholder="First Name" required > &nbsp;
 						<input value="<?php echo $lastname ?>" name="lastname" type="text" class="form-control register" placeholder="Last Name" required >
 					</div>
 					<input value="<?php echo $email ?>" name="email" type="text" class="form-control register" placeholder="Enter Email" required>
 					<input name="password" id="Upass" type="password" class="form-control register" placeholder="New Password" required>
					 <div class="sign-in-view password" style=" margin-bottom: 10px;"> <!-- view password -->
 						<input id="showpass" type="checkbox" value="" onclick="myFunction()"> Show Password
 					</div>
					
<!-- 					<input value="<?php echo $address?>" name="address" type="text" class="form-control register" placeholder="Location" required>	 -->
						<div style="display: flex;">	
						<h4 style="width: 50%;">Location : </h4> 
								<select name="address" value="<?php echo $address?>" class="form-control register" required>
					              <option></option>
					              <option>Agno, Pangasinan</option>
					              <option>Aguilar, Pangasinan</option>
					              <option>Alcala, Pangasinan</option>
					              <option>Anda, Pangasinan</option>
					              <option>Asingan, Pangasinan</option>
					              <option>Balungao, Pangasinan</option>
					              <option>Bani, Pangasinan</option>
					              <option>Basista, Pangasinan</option>
					              <option>Bautista, Pangasinan</option>
					              <option>Bayambang, Pangasinan</option>
					              <option>Binalonan, Pangasinan</option>
					              <option>Binmaley, Pangasinan</option>
					              <option>Bolinao, Pangasinan</option>
					              <option>Bugallon, Pangasinan</option>
					              <option>Burgos, Pangasinan</option>
					              <option>Calasiao, Pangasinan</option>
					              <option>Dasol, Pangasinan</option>
                  				  <option>Infanta, Pangasinan</option>
                  				  <option>Labrador, Pangasinan</option>
                  				  <option>Laoac, Pangasinan</option>
                  				  <option>Lingayen, Pangasinan</option>
                  				  <option>Mabini, Pangasinan</option>
                  				  <option>Malasiqui, Pangasinan</option>
                  				  <option>Manaoag, Pangasinan</option>
                  				  <option>Mangaldan, Pangasinan</option>
                  				  <option>Mangatarem, Pangasinan</option>
                  				  <option>Mapandan, Pangasinan</option>
                  				  <option>Natividad, Pangasinan</option>
                  				  <option>Template, Pangasinan</option>
                  				  <option>Pozorrubio, Pangasinan</option>
                  				  <option>Rosales, Pangasinan</option>
                  				  <option>San Fabian, Pangasinan</option>
                  				  <option>San Jacinto, Pangasinan</option>
                  				  <option>San Manuel, Pangasinan</option>
                  				  <option>San Nicolas, Pangasinan</option>
                  				  <option>San Quintin, Pangasinan</option>
                  				  <option>Santa Barbara, Pangasinan</option>
                  				  <option>Santa Maria, Pangasinan</option>
                  				  <option>Santo Tomas, Pangasinan</option>
                  				  <option>Sison, Pangasinan</option>
                  				  <option>Sual, Pangasinan</option>
                  				  <option>Tayug, Pangasinan</option>
                  				  <option>Umingan, Pangasinan</option>
                  				  <option>Urbiztondo, Pangasinan</option>
                  				  <option>Villasis, Pangasinan</option>

					            </select>
		        		</div>
					<div style="display: flex; padding-bottom: 4px;">
						Gender:
						&nbsp;&nbsp;<input type="radio" name="gender" value="male" > Male&nbsp;&nbsp;
  						<input type="radio" name="gender" value="female"> Female<br><br>
					</div>
					
 					<div> <!-- login button -->
 						<a href="login.php"><button type="submit" class="btn">Sign Up</button></a>
 					</div>
 					<div class="row"><!-- sign up link -->
 						<div>
                			<p class="login" style="color: gray;">Already have an account? <a class="btn_login" href="login.php" style="text-decoration: none;">Login</a></p>
              			</div>
            		</div>
 				</form>

 			</div>
 		</div>
 	</div>
<!-- script for view password icon -->
<script>
	function myFunction() {
		var x = document.getElementById("Upass");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>
</body>
</html>