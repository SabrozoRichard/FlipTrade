<?php 
  session_start();

	include("classes/connect.php");
	include("classes/login.php");
  	include("classes/user.php");
$connection = mysqli_connect("localhost","root","","dbfliptrade");

	$email = "";
	$password = "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		# code...
		$login = new Login();
		$result = $login->evaluate($_POST);
		$admin_r=$login->evaluate($_POST);
		$email = $_POST["email"];
		$password = $_POST["password"];
		$query=mysqli_query($connection,"SELECT * FROM tbl_user WHERE email='$email' AND password='$password'")or die(mysqli_error());
		$admin_q=mysqli_query($connection,"SELECT * FROM admin_acccount WHERE email='$email' AND password='$password'")or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		error_reporting(E_ERROR);
		$userstate=$fetch['userstate'];

	
		
		
		// if ($userstate=="pending") {
		// 	echo '<script type="text/javascript">';
  //           			echo 'alert("Need Admin Verification");';
  //           			echo 'window.location = "login.php";';
  //      				 	echo'</script>;';
		// }else if ($admin_r) {
		// 	header("Location: allitem.php");
		// }else if ($result != "") {
		// 	# code...
		// 	echo "<div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
		// 	echo "the following errors occured: <br><br>";
		// 	echo $result;
		// 	echo "</div>";
		// }

		// else{

		// 	header("Location: dashboard.php");
		// 	die;
		// }
	
		
	
if ($userstate=="pending") {
			echo '<script type="text/javascript">';
            			echo 'alert("Need Admin Verification");';
            			echo 'window.location = "login.php";';
       				 	echo'</script>;';
		}else if ($email=="admin@gmail.com" && $password=="admin") {
			header("Location: allitem.php");
		}
		else if ($result != "") {
			# code...
			echo "<div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
			echo "the following errors occured: <br><br>";
			echo $result;
			echo "</div>";
		}

		else{

			header("Location: dashboard.php");
			die;
		}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login | Fliptrade</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>

	<div class="login-page">
		<div class="login-box">
			<div class="img">
				<img src="img/lg.png" alt="login Image">
 			</div>
 			<div class="login-form">
 				<div class="form-heading">
 					<h3>Welcome</h3>
 				</div>
 				<form method="post">
 					<input name="email" value="<?php $email ?>" type="text" class="form-control field" id="email" placeholder="Enter Email"> <!-- Email -->
 					<input name="password" value="<?php $password ?>" type="password" class="form-control field" id="Upass" placeholder="Password"> <!-- password -->
 					<div class="sign-in-view password"> <!-- view password -->
 						<input  type="checkbox" value="" id="showpass" onclick="myFunction()"> Show Password
 					</div><br>

 					<div> <!-- login button -->
 						<input type="submit"  id="login" name="login" value="Login" class="btn">
 					</div>

 					<div class="row"><!-- sign up link -->
              			<div>
                			<p class="signup" style="color: gray;">new to Fliptrade? <a class="btn_signup" href="signup.php" style="text-decoration: none;">Sign Up</a></p>
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



