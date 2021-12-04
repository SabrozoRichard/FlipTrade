<?php 
class Login
{
	private $error = "";

	public function evaluate($data)
	{
		// addcslashes isto escaping string
		// part of the security feature to secure you website
		$email = addslashes($data['email']);
		$password = addslashes($data['password']);

		$query = "select * from tbl_user where email = '$email' limit 1";
		$admin="select * from admin_acccount where email='$email' limit 1";
		// read from database
		$DB = new Database();
		$result = $DB->read($query);

		$admin_r=$DB->read($admin);

		

		if ($result) 
		{
			$row = $result[0];
			

			if($password == $row['password']) 
			{
				//create session data
				$_SESSION['Fliptrade_userid'] = $row['userid'];
			}else
			{
				$this->error .= "Wrong Password <br>";
			}
		}
		// else if ($admin_r) {
		// 	$show = $admin_r[0];

		// 	if($password == $show['password']) 
		// 	{
		// 		//create session data
		// 		$_SESSION['admin'] = $row['userid'];
		// 	}else
		// 	{
		// 		$this->error .= "Wrong Password <br>";
		// 	}
		//}

		else
		{

			$this->error .= "No Such Email was found <br>";
		}
			return $this->error;
		
	}

	public function check_login($id)
	{		  
		if(is_numeric($id)) 
		{
			$query = "select * from tbl_user where userid = '$id' limit 1 ";
			$admin="select * from admin_acccount where userid='$id' limit 1";
			$DB = new Database();
			$result = $DB->read($query);
			$admin_r=$DB->read($admin);

			if($result) 
			{
				$user_data = $result[0];
				return $user_data;
			// }else if($admin_r){
			// 	$admin_data = $result[0];
			// 	return $admin_data;
			 }
			else
		    {
		      	header("Location: login.php");
		      	die;
		    }

		}else
		{
		    header("Location: login.php");
		    die;
		}
	}
}
?>